<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class stepsOffer extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function steps(Request $request)
    {
        $post = $request->all();

        if(!empty($post['unique_id']))
        {
            $fullname = explode(' ', $post['fullname']);
            $password = str_random(8);

            $this->user->lastname = $fullname[0];
            $this->user->firstname = $fullname[1];
            $this->user->password = Hash::make($password);
            $this->user->visible_password = $password;
            $this->user->unique_id = $post['unique_id'];

            $this->user->save();
        }

        $services = Service::all();

        return view('ask-offer', compact('post', 'services'));
    }
}
