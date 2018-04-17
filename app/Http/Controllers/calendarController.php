<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Helpers\Facades\Helper;
use App\Job;
use App\Libraries\Calendar;
use App\Libraries\LiveUpdate;
use App\Mail\SendRegisterMail;
use App\Service;
use App\User;
use Braintree_ClientToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


class calendarController extends Controller
{

    public function index()
    {
        $user = null;

        $services = Service::all();

        $jobs = Job::with('services')->with([
            'team' => function($q){
                return $q->with('leader');
            }
        ])->where('user_id', Auth::id())->get();

        $calendar = new Calendar();

        $class = 'green';

        $job = Job::where('user_id', Auth::id())->first();

        $paymentMethod = Cards::where('user_id', Auth::id())->where('defaultPaymentMethod', 1)->first();

        $clientToken = '';
        //$clientToken = Braintree_ClientToken::generate();

        return view('management.calendar.index', compact('hours', 'services', 'calendar', 'jobs', 'class', 'user', 'job', 'paymentMethod', 'clientToken'));
    }

    /*
    public function updateUser(Request $request)
    {

        if(!empty($request->all()))
        {
            $id = Auth::id();

            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'required|digits_between:10,15',
                'email' => 'required|email|unique:users,email,' . $id
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $user = User::find(Auth::id());

                $user->firstname = $request->get('firstname');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->phone = $request->get('phone');

                $user->save();

                Mail::to($user->email)->send(new SendRegisterMail($user));

                return redirect(route('calendar.offers'));
            }
        }

        return redirect()->back();
    }
    */

    public function getHours(Request $request)
    {

        if($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'date' => 'required'
            ]);

            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400);
            }
            else
            {
                $date = date('Y-m-d', strtotime($request->get('date')));

                $jobs = Job::with('services')->where('date', $date)->get();

                $unavailableRanges = [];

                if(sizeof($jobs) > 0 ) {

                    foreach ($jobs as $job) {

                        $startTime = substr($job->time, 0, -3);
                        $endTime = date("H:i", strtotime($startTime.' +'.$job->total_duration.' seconds'));

                        array_push($unavailableRanges, [$startTime, $endTime]);
                    }
                }

                return Response::json(array(
                    'success' => true,
                    'unavailableHours' => $unavailableRanges
                ), 200);
            }
        }

        return false;
    }

    public function getDates(Request $request)
    {

        if($request->ajax()) {

            $jobsDates = Job::where('user_id', Auth::id())->get();

            $unavailableDates = [];


            if(sizeof($jobsDates) > 0 ) {

                foreach ($jobsDates as $job)
                {
                    array_push($unavailableDates, date('d-m-Y', strtotime($job->date)));
                }
            }

            return Response::json(array(
                'success' => true,
                'unavailableDates' => $unavailableDates
            ), 200);

        }

        return Response::json(array(
            'success' => false,
            'message' => 'Not an ajax call!'
        ), 200);
    }

    public function getJobs(Request $request)
    {

        if($request->ajax()) {

            $jobs = Job::with('services')->with([
                'team' => function($q){
                    return $q->with('leader');
                }
            ])->where('user_id', Auth::id())->get();

            return Response::json(array(
                'success' => true,
                'jobs' => $jobs
            ), 200);

        }

        die;
    }

    public function getJob(Request $request)
    {

        if($request->ajax()) {

            $job = Job::with('services')->where('id', $request->get('id'))->with([
                'team' => function($q){
                    return $q->with('leader');
                }
            ])->where('user_id', Auth::id())->with('images')->first();

            return Response::json(array(
                'success' => true,
                'job' => $job,
                'view' => View::make('includes.popup-offer-finish', ['job' => $job])->render()
            ), 200);

        }

        die;
    }

    public function saveOffer(Request $request){

        if($request->ajax())
        {
            $validator = Validator::make($request->all(), [
                'date' => 'required'
            ]);

            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400);
            }
            else
            {
                if(Helper::userHasAddress(Auth::user())) {

                    /** calculate duration and price **/
                    $sum = 0;
                    $totalDuration = 0;
                    $temp = [];
                    $services = $request->get('services');

                    foreach ($services as $k => $serviceId) {
                        $serviceDetail = Service::find($serviceId);

                        if (!in_array($serviceDetail->duration, $temp)) {
                            $totalDuration += $serviceDetail->duration * $request->get('area');
                            array_push($temp, $serviceDetail->duration);
                        } else {
                            foreach (array_keys($temp, $serviceDetail->duration, true) as $key) {
                                unset($temp[$key]);
                            }
                        }

                        $sum += $serviceDetail->price * $request->get('area');

                    }

                    /** get available days and hours **/
                    $teams = DB::table('teams')->pluck('id')->toArray();

                    $jobs = Job::with('services')->get();

                    $availableTeam = null;
                    $unavailableHours = [];
                    foreach ($jobs as $job) {
                        $unavailableHours[$job->time] = substr($job->time, 0, -3);
                    }

                    /** save job **/
                    $job = new Job();
                    $job->date = date('Y-m-d', strtotime($request->get('date')));
                    $job->time = $request->get('time');
                    $job->area = $request->get('area');
                    $job->observations = $request->get('observations');
                    $job->sum = $sum;
                    $job->total_duration = $totalDuration;
                    $job->address = $request->get('address');
                    $key = array_rand($teams, 1);
                    $job->team_id = $teams[$key];
                    $job->user_id = Auth::id();

                    $job->save();

                    $job->services()->attach($request->get('services'));


                    //return redirect()->route('calendar.offers')->with('success', true);

                    return Response::json(array(
                        'success' => true,
                        'job_id' => $job->id
                    ), 200);
                } else {

                    return Response::json(array(
                        'success' => false,
                        'price' => 'Va rugam setati adresa in contul dvs.'
                    ), 400);
                }
            }
        }
        die;
    }


    public function getEstimatedPrice(Request $request)
    {
        if($request->ajax()) {
            $sum = 0;
            $totalDuration = 0;
            $temp = [];
            $services = $request->get('services');

            if($services && $request->get('area')) {

                foreach ($services as $k => $serviceId) {
                    $serviceDetail = Service::find($serviceId);

                    if (!in_array($serviceDetail->duration, $temp)) {
                        $totalDuration += $serviceDetail->duration * $request->get('area');
                        array_push($temp, $serviceDetail->duration);
                    } else {
                        foreach (array_keys($temp, $serviceDetail->duration, true) as $key) {
                            unset($temp[$key]);
                        }
                    }

                    $sum += $serviceDetail->price * $request->get('area');

                }

                return Response::json(array(
                    'success' => true,
                    'sum' => $sum,
                    'message' => ''
                ), 200);

                die;
            } else {
                return Response::json(array(
                    'success' => false,
                    'sum' => 0,
                    'message' => 'Alegeti cel putin un serviciu.'
                ), 200);

                die;
            }
        }
        die;
    }

}
