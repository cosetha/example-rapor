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

Route::get('/','HomeController@index');


Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/coba', 'TKeahlianController@index')->name('coba');
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
        Route::get('tahun', 'TahunController@index');
        Route::get('guru', 'MGuruController@store')->name('guru');
        Route::get('siswa', 'MGuruController@edit')->name('siswa');
        Route::get('mapel', 'MMapelController@index')->name('mapel');

        Route::get('bidang', 'mJurusanController@index');
        Route::get('bidang/show', 'mJurusanController@show');
        Route::get('bidang/edit/{id}', 'mJurusanController@edit');
        Route::post('bidang/update/{id}', 'mJurusanController@update');
        Route::get('bidang/destroy/{id}', 'mJurusanController@destroy');        
        Route::post('bidang/store', 'mJurusanController@store');
        
        Route::get('kompetensi', 'TKeahlianController@index');
        Route::get('kompetensi/show', 'TKeahlianController@show');
        Route::get('kompetensi/edit/{id}', 'TKeahlianController@edit');        
        Route::get('kompetensi/destroy/{id}', 'TKeahlianController@destroy');  
        Route::post('kompetensi/update/{id}', 'TKeahlianController@update');      
        Route::post('kompetensi/store', 'TKeahlianController@store');
    });

