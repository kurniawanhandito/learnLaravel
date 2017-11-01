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

use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
	if (View::exists('greeting')) {
	    return view('greeting', ['name' => 'Handito']);
	} else{
		return "no view created";
	}
});

Route::get('/admin', function () {
	if (View::exists('admin.dashboard')) {
	    return view('admin.dashboard', ['name' => 'Handito']);
	} else{
		return "no view created";
	}
});

Route::get('/mahasiswa', function () {
	$name = 'Handito';
    return view('mahasiswa')->with('name', $name);
});
 
Route::get('/mahasiswa/{id}', function ($id) {
    return 'Mahasiswa'.$id;
});

Route::get('/post/{post}/comment/{comment}', function ($post,$comment) {
    echo "Post : ".$post;
    echo "</br>";
    echo "Comment : ".$comment;
});

Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});

Route::group(['middleware' => ['age']], function () {
	Route::get('/user/age/{age}', function(){
		return "You have permission";
	}); 
});

Route::get('/home', function(){
	return "You don't have permission";
});

Route::get('blade', function () {
    return view('child');
});