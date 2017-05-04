<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Ultraware\Roles\Models\Role;
use Illuminate\Support\Facades\Validator;

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


        if(!empty($post))
        {
            if (!empty($post['unique_id']))
            {
                if (Auth::guest())
                {

                    if(!empty($post['step']) && $post['step'] == 1)
                    {
                        $user = User::where('unique_id', $request->get('unique_id'))->first();

                        $validator = Validator::make($request->all(), [
                            'firstname' => 'required',
                            'lastname' => 'required',
                            'phone' => 'required|digits_between:10,15',
                            'email' => 'required|email|unique:users,email,' . $user->id
                        ]);

                        if ($validator->fails()) {
                            return back()->withErrors($validator)->withInput();
                        } else {

                            $user->firstname = $request->get('firstname');
                            $user->lastname = $request->get('lastname');
                            $user->email = $request->get('email');
                            $user->phone = $request->get('phone');

                            $user->save();


                            Auth::login($user, true);

                            if (App::environment('production'))
                            {
                                Mail::send('emails.register', ['user' => $user], function ($m) use ($user) {
                                    $m->from('suport@gardinero.ro');
                                    $m->to($user->email)->subject('Cont nou Gardinero.ro');
                                });
                            }

                            return redirect(route('calendar.offers'))->with('modal', true)->withInput();
                        }

                    }
                    else {

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

                    }
                }
            }

            $services = Service::all();

            if (Auth::check()) {
                $user = Auth::user();
            }

            return view('ask-offer', compact('post', 'services', 'user'));
        }

        return redirect('/');
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

    public function updateUser(Request $request)
    {
        /** update the user **/
        if(!empty($request->all()))
        {
            $user = User::where('unique_id', $request->get('unique_id'))->first();

            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'required|digits_between:10,15',
                'email' => 'required|email|unique:users,email,' . $user->id
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {

                $user->firstname = $request->get('firstname');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->phone = $request->get('phone');

                $user->save();

                //Mail::to($user->email)->send(new SendRegisterMail($user));
                if (App::environment('production')) {
                    Mail::send('emails.register', ['user' => $user], function ($m) use ($user) {
                        $m->from('suport@gardinero.ro');
                        $m->to($user->email)->subject('Cont nou Gardinero.ro');
                    });
                }
            }

            return redirect(route('calendar.offers'))->with(['modal' => true]);
        }
    }
}
