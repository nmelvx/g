<?php

namespace App\Http\Controllers;

use App\Job;
use App\Libraries\Calendar;
use App\Service;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class calendarController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();

        $jobs = Job::with('services')->with([
            'team' => function($q){
                return $q->with('leader');
            }
        ])->get();

        $calendar = new Calendar();

        return view('management.calendar.index', compact('hours', 'services', 'calendar', 'jobs'));
    }

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

    public function getJobs(Request $request)
    {

        if($request->ajax()) {

            $jobs = Job::with('services')->with([
                'team' => function($q){
                    return $q->with('leader');
                }
            ])->where('user_id', Auth::user()->id)->get();

            return Response::json(array(
                'success' => true,
                'jobs' => $jobs
            ), 200);

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
                $teams = DB::table('teams')->pluck('id')->toArray();

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
                $job->team_id = array_rand($teams);
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
