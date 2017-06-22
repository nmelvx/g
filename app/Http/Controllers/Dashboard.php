<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function show()
    {
        $data = [
            'page_title' => 'Dashboard'
        ];

        $jobs = Job::all();

        return View('admin.pages.dashboard', compact('data', 'jobs'));
    }

}
