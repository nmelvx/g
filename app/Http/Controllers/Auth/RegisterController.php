<?php

namespace App\Http\Controllers\Auth;

use App\Mail\SendRegisterMail;
use App\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Ultraware\Roles\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/contul-meu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'visible_password' => $data['password'],
            'unique_id' => md5(uniqid(rand(), true)),
            'address' => $data['address'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude']
        ]);

        $role = Role::find(5);
        $user->attachRole($role);


        if (App::environment('production')) {
            Mail::to($user->email)->send(new SendRegisterMail($user));
            /*Mail::send('emails.register', ['user' => $user], function ($m) use ($user) {
                $m->from('suport@gardinero.ro');
                $m->to($user->email)->subject('Cont nou Gardinero.ro');
            });*/
        }

/*        Mail::send('emails.register', ['user' => $user], function ($m) use ($user) {
            $m->from('suport@gardinero.ro');
            $m->to($user->email)->subject('Cont nou Gardinero.ro');
        });*/

        return $user;
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->fields(['first_name', 'last_name', 'email'])->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/contul-meu');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        dd($authUser);

        if ($authUser){
            return $authUser;
        } else {

            $password = str_random(8);

            $user = User::updateOrCreate(
                ['email' => $facebookUser->user['email']],
                [
                    'firstname' => $facebookUser->user['first_name'],
                    'lastname' => $facebookUser->user['last_name'],
                    'email' => $facebookUser->user['email'],
                    'facebook_id' => $facebookUser->id,
                    'password' => bcrypt($password),
                    'visible_password' => $password,
                    'unique_id' => md5(uniqid(rand(), true))
                ]
            );

            if (App::environment('production')) {
                Mail::to($user->email)->send(new SendRegisterMail($user));
            }

            $role = Role::find(5);
            $user->attachRole($role);

            return $user;
        }
    }
}
