<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

    Route::get('/createNewContact', function () {
        return view('createNewContact');
    });
    Route::get('/contactList', "ContactController@contactList")->name('contactList');
    Route::post('submit','ContactController@addContact')->name('addContact');
    Route::get('/{id}/showDetails', 'ContactController@showDetails')->name('showDetails');
    Route::get('/{id}/destroy', 'ContactController@destroy')->name('destroy');
    Route::post('/{id}/updateDetails', 'ContactController@updateDetails')->name('updateDetails');
    //Route::get('/contactList/{id}', "App\Http\Controllers\ContactController@destroy");
    //Route::get('/contactDetailsEdit/{id}',"App\Http\Controllers\ContactController@showDetails");
    //Route::post('/contactDetailsEdit/{id}',"App\Http\Controllers\ContactController@updateDetails");
   

}); 


//Route::get('/forgot-password', function () {
   // return view('auth.passwords.email');
//})->middleware('guest')->name('password.request');

//Route::post('/forgot-password', function (Request $request) {
    //$request->validate(['email' => 'required|email']);

    //$status = Password::sendResetLink(
    //    $request->only('email')
    //);

    //return $status === Password::RESET_LINK_SENT
    //            ? back()->with(['status' => __($status)])
     //           : back()->withErrors(['email' => __($status)]);
//})->middleware('guest')->name('password.email');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('contacts', ContactController::class);
});

