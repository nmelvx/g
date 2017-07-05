<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Braintree_Transaction;
use Braintree_Customer;
use Braintree_WebhookNotification;
use Braintree_Subscription;
use Braintree_CreditCard;
use Braintree_PaymentMethod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller {

    protected $user;

    public function __construct() {

    }

    public function addOrder()
    {
        $input = Input::all();

        //dd($input);

        //$res = Braintree_PaymentMethod::delete('token');

        //$input['cardNumber'] = '4111111111111111';
        //$input['cardExpiry'] = '08/2020';
        //$input['cardCVC'] = '123';

        $paymentMethodNonce = $input['paymentMethodNonce'];
        $subscribed= false;

        if(isset($input['subscribed']))
        {
            $subscribed = true;
        }

        //dd(Auth::user()->paymentMethodToken);

        $customer_id = $this->registerUserOnBrainTree();
        $card_token = null;
        //$card_token = $this->getCardToken($customer_id, $input['cardNumber'], $input['cardExpiry'], $input['cardCVC']);

        print $customer_id.'<br>';
        print $card_token;

        //die;

        $job_id = $input['job_id'];

        //gateway will provide this plan id whenever you create a plan
        $plan_id = 'plan_id_here';

        if($job_id > 0)
        {
            $transction_id = $this->createTransaction($card_token, $customer_id, $job_id, $paymentMethodNonce, $plan_id, $subscribed);

            return Response::json(array(
                'success' => true
            ), 200);
        } else {
            return Response::json(array(
                'success' => false,
                'message' => 'Plata nu se poate efectua fara o comanda.'
            ), 400);
        }

        dd($transction_id);
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


    public function getCardToken($customer_id, $cardNumber, $cardExpiry, $cardCVC)
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


    public function createTransaction($creditCardToken, $customerId, $job_id, $paymentMethodNonce, $planId, $subscribed){

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

        $result = Braintree_Transaction::sale([
            'amount' => $job->sum,
            'orderId' => $job->id,
            'paymentMethodNonce' => $paymentMethodNonce,
            'customerId' => $customerId,
            'options' => [
                'submitForSettlement' => true,
                'storeInVaultOnSuccess' => true
            ],
            'billing' => [
                'firstName' => Auth::user()->firstname,
                'lastName' => Auth::user()->lastname,
                'streetAddress' => Auth::user()->address,
                'locality' => 'Bucuresti',
            ],
        ]);

        if ($result->success) {
            return $result->transaction->id;
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