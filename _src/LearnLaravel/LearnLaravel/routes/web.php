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

use App\Http\Middleware\CheckFirstName;

Route::get('/', function () {
    return view('welcome');
});

Route::get('testroute', 'TestController@index');

Route::get('form', function () {
    return view('form');
});

Route::post('formsubmit', function () {
    return 'Form Posted.';
})->middleware(CheckFirstName::class);

Route::get('user/{id}/{name}', function ($id,$name) {
    echo "User ID is ".$id;
    echo '<br/>';
    echo "Name is ".$name;
    //
})->where('id', '[0-9]+');

Route::get('userList', 'UserController@index')->middleware(CheckFirstName::class);

Route::resource('department','DepartementController');

Route::get('createUser','UserController@create');

Route::get('updateUser/{id}','UserController@update');

Route::get('listUser','UserController@read');

Route::get('deleteUser/{id}','UserController@delete');

Route::get('aboutUs', function () {
    return view('aboutUs');
});

Route::get('contactUs', function () {
    return view('contactUs');
});

Route::get('userInfo', function () {
    return view('userInfo',['name'=>'Hiren J. Dave','designation'=>'Programmer','mobile'=>'9999999999','available'=>0]);
});

Route::get('userList', function () {
    $names = array('Steve Jobs', 'Bill Gates', 'Mark Zuckerberg', 'Larry Page' );
    return view('userList',['names'=>$names]);
});


Route::resource('employee','EmployeeController')->middlware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index');
