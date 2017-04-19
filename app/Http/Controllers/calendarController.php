<?php

namespace App\Http\Controllers;

use App\Job;
use App\Libraries\Calendar;
use App\Service;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class calendarController extends Controller
{
    public function index(Request $request)
    {
        $hours = [
            '08:00:00' => '08:00',
            '08:30:00' => '08:30',
            '09:00:00' => '09:00',
            '09:30:00' => '09:30',
            '10:00:00' => '10:00',
            '10:30:00' => '10:30',
            '11:00:00' => '11:00',
            '11:30:00' => '11:30',
            '12:00:00' => '12:00',
            '12:30:00' => '12:30',
            '13:00:00' => '13:00',
            '13:30:00' => '13:30',
            '14:00:00' => '14:00',
            '14:30:00' => '14:30',
            '15:00:00' => '15:00',
            '15:30:00' => '15:30',
            '16:00:00' => '16:00',
            '16:30:00' => '16:30',
            '17:00:00' => '17:00',
            '17:30:00' => '17:30',
            '18:00:00' => '18:00',
            '18:30:00' => '18:30',
            '19:00:00' => '19:00',
            '19:30:00' => '19:30',
            '20:00:00' => '20:00',
            '20:30:00' => '20:30',
            '21:00:00' => '21:00'
        ];

        //dd($request->all());

        $services = Service::all();


        $teams = DB::table('teams')->pluck('id')->toArray();

        $jobs = Job::with('services')->get();

        $unavailableDates = [];
        $unavailableHours = [];
        foreach($jobs as $job)
        {
            $unavailableHours[$job->time] = substr($job->time, 0, -3);
        }

        //$hours = array_diff($hours, $unavailableHours);

        $calendar = new Calendar();

        return view('management.calendar.index', compact('hours', 'services', 'calendar', 'unavailableHours'));
    }

    public function getHours(Request $request)
    {
        $hours = [
            '08:00:00' => '08:00',
            '08:30:00' => '08:30',
            '09:00:00' => '09:00',
            '09:30:00' => '09:30',
            '10:00:00' => '10:00',
            '10:30:00' => '10:30',
            '11:00:00' => '11:00',
            '11:30:00' => '11:30',
            '12:00:00' => '12:00',
            '12:30:00' => '12:30',
            '13:00:00' => '13:00',
            '13:30:00' => '13:30',
            '14:00:00' => '14:00',
            '14:30:00' => '14:30',
            '15:00:00' => '15:00',
            '15:30:00' => '15:30',
            '16:00:00' => '16:00',
            '16:30:00' => '16:30',
            '17:00:00' => '17:00',
            '17:30:00' => '17:30',
            '18:00:00' => '18:00',
            '18:30:00' => '18:30',
            '19:00:00' => '19:00',
            '19:30:00' => '19:30',
            '20:00:00' => '20:00',
            '20:30:00' => '20:30',
            '21:00:00' => '21:00'
        ];

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

                $unavailableHours = [];
                if(sizeof($jobs) > 0 ) {

                    foreach ($jobs as $job) {
                        $unavailableHours[$job->time] = substr($job->time, 0, -3);
                        $totalDuration = date('H:i:s', strtotime($job->total_duration));
                        $new_time = date("H:i:s", strtotime('+'.$totalDuration.' hours'));
                    }
                }

                return Response::json(array(
                    'success' => true,
                    'unavailableHours' => $unavailableHours
                ), 200);
            }
        }

        return false;
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

                $sum = 0;
                $totalDuration = 0;
                $temp = [];
                $services = $request->get('services');

                foreach($services as $k => $serviceId)
                {
                    $serviceDetail = Service::find($serviceId);

                    if(!in_array($serviceDetail->duration, $temp) && ($k+1)%2 != 0)
                    {
                        $totalDuration += $serviceDetail->duration * $request->get('area');
                    }

                    $sum += $serviceDetail->price * $request->get('area');

                }

                /** get available days and hours **/
                $teams = DB::table('teams')->lists('id')->toArray();

                print_r($teams);die;

                $jobs = Job::with('services')->get();

                $availableTeam = null;
                $unavailableHours = [];
                foreach($jobs as $job)
                {
                    $unavailableHours[$job->time] = substr($job->time, 0, -3);
                }

                /** save job **/
                $job = new Job();
                $job->date = date('Y-m-d', strtotime($request->get('date')));
                $job->time = $request->get('time');
                $job->area = $request->get('area');
                $job->sum  = $sum;
                $job->total_duration = $totalDuration;
                $job->address = $request->get('address');

                $job->save();

                $job->services()->attach($request->get('services'));

                return Response::json(array(
                    'success' => true
                ), 200);
            }
        }
        die;
    }

}
