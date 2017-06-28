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

        $jobs = Job::whereHas('user', function ($query) {
            $query->where('id', '>', 0);
        })->get();

        return View('admin.pages.dashboard', compact('data', 'jobs'));
    }

}
