<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $type = 'jobs';

        $jobs = Job::where('date', date('Y-m-d'))->where('time', date('H:i:s'))->get();

        return view('management.jobs.index', compact('type'));
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function create()
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy()
    {

    }
}
