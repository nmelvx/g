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

Route::group(['prefix' => 'admin'], function () {
    //Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::get('/dashboard', ['as' => 'dashboard', 'middleware' => 'role:admin', 'uses' => 'Dashboard@show']);

});


Route::group(['middleware' => 'role:admin|leader'], function()
{
    Route::resource('lucrari-disponibile', 'JobsController');
    Route::resource('management-echipe', 'TeamController');
    Route::post('/save-member', ['as' => 'member.store', 'uses' => 'TeamMembersController@store']);
});

Route::group(['middleware' => 'role:client'], function()
{
    Route::resource('contul-meu', 'AccountController');
    Route::any('calendar', ['as' => 'calendar.offers', 'uses' => 'calendarController@index']);
    Route::post('get-hours', ['as' => 'get.hours', 'uses' => 'calendarController@getHours']);
    Route::get('get-jobs', ['as' => 'get.jobs', 'uses' => 'calendarController@getJobs']);
});

Route::group(['middleware' => 'web'], function() {
    Route::any('check-email', ['as' => 'check.email', 'uses' => 'stepsOffer@checkEmail']);
    Route::any('cere-oferta', ['as' => 'offer.steps', 'uses' => 'stepsOffer@steps']);
    Route::post('save-offer', ['as' => 'save.offer', 'uses' => 'calendarController@saveOffer']);
    Route::get('{slug}', [ 'as' => 'pages.show', 'uses' => 'PagesController@show'])->where('slug', '[A-Za-z-0-9]+');
});






