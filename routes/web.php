<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use Ultraware\Roles\Models\Permission;
use Ultraware\Roles\Models\Role;


Route::any('/', array( 'as' => 'home', 'uses' => 'HomeController@index' ));

Route::get('/generate_passowrd', function () {
    return Hash::make('marius00');
});

Route::get('/new_user', function () {


    $user = User::create([
        'firstname' => 'Eduard',
        'lastname' => 'Neacsu',
        'email' => 'neacsu.eduard@gmail.com',
        'phone' => '0737540530',
        'password' => Hash::make('111111')
    ]);

    /*$role = Role::create([
        'name' => 'Team member',
        'slug' => 'team.member',
        'description' => 'Team member', // optional
        'level' => 3, // optional, set to 1 by default
    ]);*/
    $role = Role::find(4);

    /*$prermission = Permission::create([
        'name' => 'Administer teams',
        'slug' => 'administer.teams',
    ])*/;

    $user->attachRole($role);

    //$adminRole->attachPermission($prermission);

    return $user;
});


/*Route::get('/admin_role', function () {

    $adminRole = Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => '', // optional
        'level' => 1, // optional, set to 1 by default
    ]);

    return $adminRole;
});*/

/*Route::group([ 'prefix' => 'admin ', 'middleware' => 'role:admin' ],
    function () {
        Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Admin\Dashboard@index']);
    }
);*/

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    Route::get('/jobs', ['as' => 'jobs', 'middleware' => 'role:admin', 'uses' => 'JobController@show']);
    Route::resource('job', 'JobController');
});

Route::group(['middleware' => 'role:admin|leader'], function()
{
    Route::resource('lucrari-disponibile', 'JobsController');
    Route::resource('management-echipe', 'TeamController');
    Route::post('/save-member', ['as' => 'member.store', 'uses' => 'TeamMembersController@store']);
});

/* remove admin role when in production */
Route::group(['middleware' => 'role:client|leader|admin'], function()
{
    Route::resource('contul-meu', 'AccountController');
    Route::any('calendar', ['as' => 'calendar.offers', 'uses' => 'calendarController@index']);
    Route::post('get-hours', ['as' => 'get.hours', 'uses' => 'calendarController@getHours']);
    Route::post('get-price', ['as' => 'get.price', 'uses' => 'calendarController@getEstimatedPrice']);
    Route::post('get-dates', ['as' => 'get.dates', 'uses' => 'calendarController@getDates']);
    Route::get('get-jobs', ['as' => 'get.jobs', 'uses' => 'calendarController@getJobs']);
    Route::get('get-job', ['as' => 'get.job', 'uses' => 'calendarController@getJob']);
    Route::post('change-address', ['as' => 'change.address', 'uses' => 'AccountController@changeAddress']);
    Route::post('send-opinion', ['as' => 'send.opinion', 'uses' => 'AccountController@sendOpinion']);

    Route::post('payment-create', ['as' => 'payment.create', 'uses' => 'PaymentController@addOrder']);
    Route::post('payment-delete', ['as' => 'payment.delete', 'uses' => 'PaymentController@deleteCard']);

});


Route::group(['middleware' => 'web'], function() {
    Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');
    Route::post('update-user', ['as' => 'update.user', 'uses' => 'stepsOffer@updateUser']);
    Route::any('check-email', ['as' => 'check.email', 'uses' => 'stepsOffer@checkEmail']);
    Route::any('cere-oferta', ['as' => 'offer.steps', 'uses' => 'stepsOffer@steps']);
    Route::post('save-offer', ['as' => 'save.offer', 'uses' => 'calendarController@saveOffer']);
    Route::get('{slug}', [ 'as' => 'pages.show', 'uses' => 'PagesController@show'])->where('slug', '[A-Za-z-0-9]+');
});






