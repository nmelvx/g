<?php

namespace App\Http\Controllers;

use App\Job;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class JobController extends Controller
{

    protected $images;
    protected $job;


    public function __construct( ImageRepository $images )
    {
        $this->images = $images;
        $this->job = new Job();
    }

    public function show()
    {
        $data = [
            'page_title' => 'Dashboard'
        ];

        $jobs = Job::whereHas('user', function ($query) {
            $query->where('id', '>', 0);
        })->get();

        return View('admin.pages.dashboard', compact('data', 'jobs'));
    }

    public function edit($id)
    {
        $job = Job::where('id', $id)->with('images')->first();

        return View('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::where('id', $id)->first();

        $job->title = $request->input('title');
        $job->date = $request->input('date');
        $job->status = ($request->input('status') == 1)? 1:0;

        $job->save();

        if( !empty($request->file('images')) )
            $this->images->save( $request->file('images'), $job );

        return redirect('/admin/job/'.$job->id.'/edit')->with(
            ['message' => 'Job edited successfully.']
        );
    }
}
