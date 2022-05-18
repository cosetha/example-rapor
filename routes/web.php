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
    ->middleware(['auth','role:Admin'])
    ->group(function () {

        Route::get('tahun', 'TahunController@index');
        Route::get('tahun/show', 'TahunController@show');
        Route::get('tahun/edit/{id}', 'TahunController@edit');
        Route::post('tahun/update/{id}', 'TahunController@update');
        Route::get('tahun/destroy/{id}', 'TahunController@destroy');
        Route::get('tahun/aktif/{id}', 'TahunController@AktifkanSemester');
        Route::post('tahun/store', 'TahunController@store');

        Route::get('user', 'MWaliMuridController@index');

        Route::get('set_kelas', 'TKelasController@index');
        Route::post('set_kelas/get_siswa', 'TKelasController@getSiswa');
        Route::post('set_kelas/get_siswa_perm', 'TKelasController@getSiswaPerm');
        Route::post('set_kelas/add_siswa', 'TKelasController@addSiswa');
        Route::post('set_kelas/update/{id}', 'TKelasController@update');
        Route::get('set_kelas/destroy/{id}', 'TKelasController@destroy'); 
        Route::get('set_kelas/remove/{id}', 'TKelasController@removeSiswa');         
        Route::post('set_kelas/store', 'TKelasController@store');

        Route::get('set_walikelas', 'TWaliKelasController@index');
        Route::get('set_walikelas/show', 'TWaliKelasController@show');
        Route::post('set_walikelas/store', 'TWaliKelasController@store');
        Route::get('set_walikelas/destroy/{id}', 'TWaliKelasController@destroy');   
        Route::get('set_walikelas/edit/{id}', 'TWaliKelasController@edit');
        Route::post('set_walikelas/update/{id}', 'TWaliKelasController@update');

        Route::get('set_mapel', 'TGuruMapelUmumController@index');
        Route::get('set_mapel/show', 'TGuruMapelUmumController@show');
        Route::post('set_mapel/store', 'TGuruMapelUmumController@store');
        Route::get('set_mapel/destroy/{id}', 'TGuruMapelUmumController@destroy');   
        Route::get('set_mapel/edit/{id}', 'TGuruMapelUmumController@edit');
        Route::post('set_mapel/update/{id}', 'TGuruMapelUmumController@update');

        Route::get('set_mapel_ahli', 'TGuruMapelAhliController@index');
        Route::get('set_mapel_ahli/coba', 'TGuruMapelAhliController@coba');
        Route::get('set_mapel_ahli/show', 'TGuruMapelAhliController@show');
        Route::post('set_mapel_ahli/store', 'TGuruMapelAhliController@store');
        Route::get('set_mapel_ahli/destroy/{id}', 'TGuruMapelAhliController@destroy');   
        Route::get('set_mapel_ahli/edit/{id}', 'TGuruMapelAhliController@edit');
        Route::post('set_mapel_ahli/update/{id}', 'TGuruMapelAhliController@update');

        Route::post('set_mapel_ahli/get_mapel', 'TGuruMapelAhliController@create');


        Route::get('guru', 'MGuruController@index');
        Route::get('guru/show', 'MGuruController@show');
        Route::get('guru/edit/{id}', 'MGuruController@edit');
        Route::post('guru/update/{id}', 'MGuruController@update');
        Route::get('guru/destroy/{id}', 'MGuruController@destroy');        
        Route::post('guru/store', 'MGuruController@store');

        Route::get('wali', 'MWaliMuridController@index');
        Route::get('wali/show', 'MWaliMuridController@show');
        Route::get('wali/edit/{id}', 'MWaliMuridController@edit');
        Route::post('wali/update/{id}', 'MWaliMuridController@update');
        Route::get('wali/destroy/{id}', 'MWaliMuridController@destroy');        
        Route::post('wali/store', 'MWaliMuridController@store');

        Route::get('siswa', 'MSiswaController@index');
        Route::get('siswa/show', 'MSiswaController@show');
        Route::get('siswa/edit/{id}', 'MSiswaController@edit');
        Route::post('siswa/update/{id}', 'MSiswaController@update');
        Route::get('siswa/destroy/{id}', 'MSiswaController@destroy');        
        Route::post('siswa/store', 'MSiswaController@store');

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

        Route::get('mapel-kejuruan', 'MMapelAhliController@index');
        Route::get('mapel-kejuruan/show', 'MMapelAhliController@show');
        Route::get('mapel-kejuruan/edit/{id}', 'MMapelAhliController@edit');
        Route::post('mapel-kejuruan/update/{id}', 'MMapelAhliController@update');
        Route::get('mapel-kejuruan/destroy/{id}', 'MMapelAhliController@destroy');        
        Route::post('mapel-kejuruan/store', 'MMapelAhliController@store');


        Route::get('bidang', 'MJurusanController@index');
        Route::get('bidang/show', 'MJurusanController@show');
        Route::get('bidang/edit/{id}', 'MJurusanController@edit');
        Route::post('bidang/update/{id}', 'MJurusanController@update');
        Route::get('bidang/destroy/{id}', 'MJurusanController@destroy');        
        Route::post('bidang/store', 'MJurusanController@store');

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

Route::prefix('dashboard')
    ->middleware(['auth','role:Walikelas'])
    ->group(function () {

        Route::get('raport', 'RaportController@index');
        Route::get('raport/list/{id}', 'RaportController@create');

        Route::get('raport/sampul1/{id}', 'RaportController@sampul1');
        Route::get('raport/sampul2/{id}', 'RaportController@sampul2');
        Route::get('raport/sampul3/{id}', 'RaportController@sampul3');
        Route::get('raport/raport/{id}', 'RaportController@raport');
});

Route::prefix('dashboard')
    ->middleware(['auth','role:Guru'])
    ->group(function () {
        Route::get('absen', 'TKeahlianController@index');
        Route::get('nilai_umum', 'TNilaiController@index');
        Route::get('nilai_umum/add/{id}', 'TNilaiController@create');
        Route::POST('nilai_umum/store/{id}', 'TNilaiController@store');

        Route::get('nilai_ahli', 'TNilaiAhliController@index');
        Route::get('nilai_ahli/add/{id}', 'TNilaiAhliController@create');
        Route::POST('nilai_ahli/store/{id}', 'TNilaiAhliController@store');
});

Route::prefix('dashboard')
    ->middleware(['auth','role:BK'])
    ->group(function () {
        Route::get('nilai_absen', 'TNilaiAbsensiController@index');
        Route::get('nilai_absen/add/{id}', 'TNilaiAbsensiController@create');
        Route::POST('nilai_absen/store/{id}', 'TNilaiAbsensiController@store');

        Route::get('nilai_sikap', 'TNilaiSikapController@index');
        Route::get('nilai_sikap/add/{id}', 'TNilaiSikapController@create');
        Route::POST('nilai_sikap/store/{id}', 'TNilaiSikapController@store');

        Route::get('nilai_ekstra', 'TNilaiExtraController@index');
        Route::get('nilai_ekstra/add/{id}', 'TNilaiExtraController@create');
        Route::POST('nilai_ekstra/store/{id}', 'TNilaiExtraController@store');

        Route::get('pkl', 'TPklController@index');
        Route::get('pkl/add/{id}', 'TPklController@create');
        Route::POST('pkl/store/{id}', 'TPklController@store');
});
