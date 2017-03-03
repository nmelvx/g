<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function index()
    {
        return view('management.account.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if($user)
        {
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');

            if (!$request->input('password') == '') {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            return Redirect::to('/contul-meu');
        }
    }
}
