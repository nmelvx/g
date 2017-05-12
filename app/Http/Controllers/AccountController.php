<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        $class = 'green';

        return view('management.account.index', compact('class'));
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
                'email' => 'required|email|unique:users,email,' . $user->id,
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

    public function changeAddress(Request $request)
    {
        if($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required'
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
                $user = Auth::user();

                $user->address = $request->input('address');
                $user->latitude = $request->input('latitude');
                $user->longitude = $request->input('longitude');

                $user->save();

                return Response::json(array(
                    'success' => true
                ), 200);
            }
        }

        return false;
    }
}
