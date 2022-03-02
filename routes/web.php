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
        Route::get('tahun/show', 'TahunController@show');
        Route::get('tahun/edit/{id}', 'TahunController@edit');
        Route::post('tahun/update/{id}', 'TahunController@update');
        Route::get('tahun/destroy/{id}', 'TahunController@destroy');
        Route::get('tahun/aktif/{id}', 'TahunController@AktifkanSemester');
        Route::post('tahun/store', 'TahunController@store');

        Route::get('guru', 'MGuruController@store')->name('guru');
        Route::get('siswa', 'MGuruController@edit')->name('siswa');

        Route::get('mapel', 'MMapelController@index')->name('mapel');
        Route::get('mapel/show', 'MMapelController@show');
        Route::get('mapel/edit/{id}', 'MMapelController@edit');
        Route::post('mapel/update/{id}', 'MMapelController@update');
        Route::get('mapel/destroy/{id}', 'MMapelController@destroy');        
        Route::post('mapel/store', 'MMapelController@store');
        
        Route::get('kelas', 'MKelasController@index');
        Route::get('kelas/show', 'MKelasController@show');
        Route::get('kelas/edit/{id}', 'MKelasController@edit');
        Route::post('kelas/update/{id}', 'MKelasController@update');
        Route::get('kelas/destroy/{id}', 'MKelasController@destroy');        
        Route::post('kelas/store', 'MKelasController@store');

        Route::post('keahlian/create', 'MKelasController@create');

        Route::get('mapel-kejuruan', 'MMapelAhliCOntroller@index');
        Route::get('mapel-kejuruan/show', 'MMapelAhliCOntroller@show');
        Route::get('mapel-kejuruan/edit/{id}', 'MMapelAhliCOntroller@edit');
        Route::post('mapel-kejuruan/update/{id}', 'MMapelAhliCOntroller@update');
        Route::post('mapel-kejuruan/destroy/{id}', 'MMapelAhliCOntroller@destroy');        
        Route::post('mapel-kejuruan/store', 'MMapelAhliCOntrollerkejuruan@store');


        Route::get('bidang', 'mJurusanController@index');
        Route::get('bidang/show', 'mJurusanController@show');
        Route::get('bidang/edit/{id}', 'mJurusanController@edit');
        Route::post('bidang/update/{id}', 'mJurusanController@update');
        Route::get('bidang/destroy/{id}', 'mJurusanController@destroy');        
        Route::post('bidang/store', 'mJurusanController@store');

        Route::get('ekstra', 'MExtraController@index');
        Route::get('ekstra/show', 'MExtraController@show');
        Route::get('ekstra/edit/{id}', 'MExtraController@edit');
        Route::post('ekstra/update/{id}', 'MExtraController@update');
        Route::get('ekstra/destroy/{id}', 'MExtraController@destroy');        
        Route::post('ekstra/store', 'MExtraController@store');
        
        Route::get('kompetensi', 'TKeahlianController@index');
        Route::get('kompetensi/show', 'TKeahlianController@show');
        Route::get('kompetensi/edit/{id}', 'TKeahlianController@edit');        
        Route::get('kompetensi/destroy/{id}', 'TKeahlianController@destroy');  
        Route::post('kompetensi/update/{id}', 'TKeahlianController@update');      
        Route::post('kompetensi/store', 'TKeahlianController@store');
    });

