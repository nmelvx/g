<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        return view('management.account.index');
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
        $user = Auth::user();

        if($user)
        {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'phone' => 'required|numeric',
                'email' => 'required|max:255|unique:users,email,1',
                'password' => 'confirmed',
            ]);

            if ($validator->fails()) {
                return redirect('contul-meu')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->phone = $request->input('phone');
                $user->email = $request->input('email');

                if (!$request->input('password') == '') {
                    $user->password = bcrypt($request->input('password'));
                }

                $user->save();

                return Redirect::to('contul-meu');
            }

        }
    }

    public function destroy()
    {

    }
}
