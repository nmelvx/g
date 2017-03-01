<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function show()
    {
        $data = [
            'page_title' => 'Dashboard'
        ];

        return View('admin.pages.dashboard', compact('data'));
    }

}
