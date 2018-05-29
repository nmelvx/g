<?php

namespace App\Http\Controllers;

use App\Job;
use App\Libraries\LiveUpdate;
use App\Service;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
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

        $this->lu->setBackRefURL(Config::get('payu.BACK_REF'));
        $this->lu->setTestMode(Config::get('payu.TEST_MODE'));
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