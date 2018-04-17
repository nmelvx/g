<?php

namespace App\Http\Controllers;


use App\Cards;
use App\Job;
use Braintree_ClientToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        $class = 'green';

        $job = Job::where('user_id', Auth::id())->where('date', '>=', date('Y-m-d'))->orWhere('time', '>=', date('H:i:s'))->where('user_id', Auth::id())->orderBy('date', 'ASC')->orderBy('time', 'ASC')->first();

        $cards = Cards::where('user_id', Auth::user()->id)->orderby('defaultPaymentMethod', 'DESC')->get();

        //$clientToken = Braintree_ClientToken::generate();
        //return view('management.account.index', compact('class', 'job', 'cards', 'clientToken'));

        return view('management.account.index', compact('class', 'job', 'cards'));

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

                return Redirect::to('contul-meu')->with('success', 'Date actualizate cu succes.');
            }

        }
    }

    public function sendOpinion(Request $request)
    {
        $user = Auth::user();

        if($user)
        {
            $validator = Validator::make($request->all(), [
                'opinion' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('contul-meu')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $user->opinion = $request->get('opinion');

                if (App::environment('production')) {
                    Mail::send('emails.opinion', ['user' => $user], function ($m) use ($user) {
                        $m->from('suport@gardinero.ro');
                        $m->to($user->email)->subject('Formular: Parerea ta conteaza!');
                    });
                }

                return Redirect::to('contul-meu')->with('success-opinion', 'Multumim pentru mesaj.');
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
