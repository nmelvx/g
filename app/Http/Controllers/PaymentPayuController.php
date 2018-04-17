<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Job;
use App\Libraries\LiveUpdate;
use App\Service;
use App\Services;
use Braintree_ClientToken;
use Braintree_Error_Validation;
use Braintree_Exception_NotFound;
use Braintree_PaymentMethodNonce;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
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

class PaymentPayuController extends Controller {

    protected $user;
    protected $message;
    protected $code;
    protected $status;
    protected $extra;
    protected $lu;
    protected $shipping;

    public function __construct() {
        $this->status = false;
        $this->code = 400;
        $this->shipping = -1;
        $this->lu = new LiveUpdate();
    }

    public function createForm()
    {
        $request = Input::all();

        $products = [];

        $temp = [];

        $job = Job::find($request['JOB_ID']);
        $services = $job->services()->pluck('services.id');

        foreach ($services as $k => $serviceId) {

            $serviceDetail = Service::find($serviceId);

            array_push($products, [
                'code' => $serviceDetail->code,
                'name' => $serviceDetail->title,
                'price' => $serviceDetail->price * $job->area,
                'priceType' => 'GROSS',
                'qty' => 1,
                'vat' => 19,
            ]);
        }

        $this->lu->setTestMode(true);
        $this->lu->setSecretKey(Config::get('payu.SECRET_KEY'))
            ->setMerchant(Config::get('payu.MERCHANT_CODE'))
            ->setOrderRef($request['JOB_ID'])
            ->setOrderDate(date('Y-m-d H:i:s'));

        foreach($products as $product){
            $this->lu->addProduct($product['code'], $product['name'], $product['price'], $product['qty'], $product['vat'], null, $product['priceType'], null);
        }

        $this->lu->setOrderShipping($this->shipping);

        $this->status = true;
        $this->code = 200;

        return Response::json(array(
            'success' => $this->status,
            'url' => $this->lu->getLiveUpdateURL(),
            'html' => $this->lu->getLiveUpdateHTML(),
        ), $this->code);
    }

    public function addOrder()
    {
        $request = Input::all();



    }


}