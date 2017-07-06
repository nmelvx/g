<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Job;
use Braintree_ClientToken;
use Braintree_Exception_NotFound;
use Braintree_PaymentMethodNonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Braintree_Transaction;
use Braintree_Customer;
use Braintree_WebhookNotification;
use Braintree_Subscription;
use Braintree_CreditCard;
use Braintree_PaymentMethod;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller {

    protected $user;

    public function __construct() {

    }

    public function deleteCard(Request $request)
    {
        try {
            $result = Braintree_PaymentMethod::delete($request->input('paymentMethodToken'));
            if($result->success)
            {
                Cards::where('id', $request->input('paymentId'))->delete();
                $availableCards = Cards::where('user_id', Auth::user()->id)->get();

                return Response::json(array(
                    'success' => true,
                    'box' => 'box'.$request->input('paymentId'),
                    'form' => ($availableCards->isEmpty())?1:0
                ), 200);
            }
        } catch (Braintree_Exception_NotFound $e) {
            return Response::json(array(
                'success' => false,
                'message' => 'Eroare stergere card.'
            ), 400);
        }
    }

    public function addOrder()
    {
        $input = Input::all();

        $customer_id = $this->registerUserOnBrainTree();
        $paymentMethodNonce = !empty($input['paymentMethodNonce'])? $input['paymentMethodNonce']:null;
        $paymentMethod = null;
        $result = null;


        if($paymentMethodNonce != null)
        {
            $result = Braintree_PaymentMethod::create([
                'customerId' => $customer_id,
                'paymentMethodNonce' => $paymentMethodNonce,
                'options' => [
                    'failOnDuplicatePaymentMethod' => true
                ]
            ]);

        }


        if (isset($result->success) && $result->success) {

            $paymentMethod = Cards::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'uniqueNumberIdentifier' => $result->paymentMethod->_attributes['uniqueNumberIdentifier']
                ],
                [
                    'user_id' => Auth::user()->id,
                    'last4' => $result->paymentMethod->_attributes['last4'],
                    'cardType' => $result->paymentMethod->_attributes['cardType'],
                    'cardholderName' => $result->paymentMethod->_attributes['cardholderName'],
                    'expirationMonth' => $result->paymentMethod->_attributes['expirationMonth'],
                    'expirationYear' => $result->paymentMethod->_attributes['expirationYear'],
                    'maskedNumber' => $result->paymentMethod->maskedNumber,
                    'token' => $result->paymentMethod->_attributes['token'],
                    'success' => $result->success,
                    'defaultPaymentMethod' => 1
                ]
            );

        } else {
            /*if(!empty($result->errors->deepAll())){

                $status = $result->errors->deepAll();

                if($status[0]->code == 81724)
                {
                    $paymentMethod = Cards::where('user_id', Auth::user()->id)->where('defaultPaymentMethod', 1)->first();
                }
            }*/
            $paymentMethod = Cards::where('user_id', Auth::user()->id)->where('defaultPaymentMethod', 1)->first();
        }

        if(isset($input['createPayment']))
        {
            return Response::json(array(
                'success' => true,
            ), 200);
        }


        $subscribed= false;
        if(isset($input['subscribed']))
        {
            $subscribed = true;
        }

        $card_token = null;
        //$card_token = $this->createCardToken($customer_id, $input['cardNumber'], $input['cardExpiry'], $input['cardCVC']);



        $job_id = !empty($input['job_id'])? $input['job_id']:0;


        //gateway will provide this plan id whenever you create a plan
        $plan_id = 'plan_id_here';

        if($job_id > 0)
        {
            $this->createTransaction($card_token, $customer_id, $job_id, $paymentMethod->toArray(), $plan_id, $subscribed);

            return Response::json(array(
                'success' => true
            ), 200);
        } else {
            return Response::json(array(
                'success' => false,
                'message' => 'Plata nu se poate efectua fara o comanda.'
            ), 400);
        }

        die;
    }


    public function registerUserOnBrainTree()
    {
        $user = Auth::user();

        if ($user->braintree_customer_id == null) {

            $result = Braintree_Customer::create([
                'firstName' => Auth::user()->firstname,
                'lastName' => Auth::user()->lastname,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone
            ]);

            if ($result->success) {

                $user->braintree_customer_id = $result->customer->id;
                $user->save();

                return $result->customer->id;
            } else {
                $errorFound = '';
                foreach ($result->errors->deepAll() as $error) {
                    $errorFound .= $error->message . "<br />";
                }
                echo $errorFound;
            }
        }

        return $user->braintree_customer_id;
    }


    public function createCardToken($customer_id, $cardNumber, $cardExpiry, $cardCVC)
    {
        $card_result = Braintree_CreditCard::create([
            'number' => $cardNumber,
            'expirationDate' => trim($cardExpiry),
            'customerId' => $customer_id,
            'cvv' => $cardCVC
        ]);

        if($card_result->success)
        {
            return $card_result->creditCard->token;
        }
        else {
            return false;
        }
    }


    public function createTransaction($creditCardToken, $customerId, $job_id, $paymentMethod, $planId, $subscribed){

        /*if($subscribed)
        {
            $subscriptionData = array(
                'paymentMethodToken' => $creditCardToken,
                'planId' => $planId
            );
            $this->cancelSubscription();
            $subscription_result = Braintree_Subscription::create($subscriptionData);
            echo 'Subscription id'. $subscription_result->subscription->id;
        }
        else {
            $this->cancelSubscription();
        }*/

        $job = Job::find($job_id);
        //'paymentMethodNonce' => $paymentMethodNonce,


        $result = Braintree_Transaction::sale([
            'amount' => $job->sum,
            'orderId' => $job->id,
            'customerId' => $customerId,
            'paymentMethodToken' => $paymentMethod['token'],
            'options' => [
                'submitForSettlement' => true
            ],
            'billing' => [
                'firstName' => Auth::user()->firstname,
                'lastName' => Auth::user()->lastname,
                'streetAddress' => Auth::user()->address,
                'locality' => 'Bucuresti',
            ]
        ]);

        if ($result->success) {

            $job->payed = 1;
            $job->save();

        } else {
            $errorFound = '';
            foreach ($result->errors->deepAll() as $error1) {
                $errorFound .= $error1->message . "<br />";
            }
        }
    }


    public function cancelSubscription()
    {
        $gateway_subscription_id = '';
        if($gateway_subscription_id != '')
        {
            Braintree_Subscription::cancel($gateway_subscription_id);
        }
    }


    /* for subscription Braintree_WebhookNotification */
    public function subscription()
    {
        try{
            if(isset($_POST["bt_signature"]) && isset($_POST["bt_payload"])) {
                $webhookNotification = Braintree_WebhookNotification::parse(
                    $_POST["bt_signature"], $_POST["bt_payload"]
                );

                Log::info("transactions " . json_encode($webhookNotification->subscription->transactions));
                Log::info("transactions_id " . json_encode($webhookNotification->subscription->transactions[0]->id));
                Log::info("customer_id " . json_encode($webhookNotification->subscription->transactions[0]->customerDetails->id));
                Log::info("amount " . json_encode($webhookNotification->subscription->transactions[0]->amount));
            }
        }
        catch (\Exception $ex) {
            Log::error("PaymentController::subscription() " . $ex->getMessage());
        }
    }
}