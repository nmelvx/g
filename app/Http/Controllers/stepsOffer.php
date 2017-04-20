<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Ultraware\Roles\Models\Role;

class stepsOffer extends Controller
{
    protected $user;
    protected $redirectTo = '/calendar';

    public function __construct()
    {
        $this->user = new User();
    }

    public function steps(Request $request)
    {
        $post = $request->all();
        $user = null;

        if (!empty($post['unique_id'])) {

            if (Auth::guest()) {

                $fullname = explode(' ', $post['fullname']);
                $password = str_random(8);

                $this->user->lastname = $fullname[0];
                $this->user->firstname = $fullname[1];
                $this->user->password = Hash::make($password);
                $this->user->visible_password = $password;
                $this->user->unique_id = $post['unique_id'];
                $this->user->phone = $post['phone'];
                $this->user->address = $post['address'];
                $this->user->latitude = $post['latitude'];
                $this->user->longitude = $post['longitude'];

                $this->user->save();

                //get client role
                $role = Role::find(5);
                $this->user->attachRole($role);

                Auth::login($this->user, true);
            }
        }

        $services = Service::all();

        if(Auth::check()){
            $user = Auth::user();
        }

        return view('ask-offer', compact('post', 'services', 'user'));
    }

    public function checkEmail(Request $request)
    {
        if(Auth::check()){
            return Response::json(array(
                'success' => true
            ), 200);
        }
        $user = User::where('email', $request->get('email'))->first();

        return Response::json(array(
            'success' => ($user === null)? true:false
        ), 200);
    }
}
