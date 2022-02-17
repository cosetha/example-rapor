<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('auth.login');
// });


Route::get('/', 'HomeController@index')->name('home');
Route::get('/coba', 'MGuruController@index')->name('coba');
Route::get('/store', 'MGuruController@create')->name('store');
Route::get('/destroy', 'MGuruController@destroy')->name('destroy');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function () {
        
    });

