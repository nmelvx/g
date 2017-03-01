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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate_passowrd', function () {
    return Hash::make('marius00');
});

Route::get('/new_user', function () {


/*    $user = User::create([
        'name' => 'Marius Neacsu',
        'email' => 'nme.edy2006@gmail.com',
        'password' => 'marius00'
    ]);

    $adminRole = Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => '', // optional
        'level' => 1, // optional, set to 1 by default
    ]);

    $user->attachRole($adminRole);*/
    $user = User::find(1);
    $adminRole = Role::find(1);

    $user->attachRole($adminRole);

    $createUsersPermission = Permission::find(1);

    $adminRole->detachAllPermissions();
    $adminRole->attachPermission($createUsersPermission);

    return $adminRole;
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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::get('/dashboard', ['as' => 'dashboard', 'middleware' => 'role:admin', 'uses' => 'Dashboard@show']);

});

Auth::routes();

Route::get('/home', 'HomeController@index');
