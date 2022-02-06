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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/siswa/index','SiswaController@SiswaIndex');
Route::post('/siswa/create','SiswaController@SiswaCreate');
Route::get('/siswa/edit/{id}','SiswaController@SiswaEdit');
Route::put('/siswa/update/{id}','SiswaController@SiswaUpdate');
Route::get('/siswa/delete/{id}','SiswaController@SiswaDelete');

Route::get('/kelas/index','KelasController@KelasIndex');
Route::post('/kelas/create','KelasController@KelasCreate');
Route::get('/kelas/edit/{id}','KelasController@KelasEdit');
Route::put('/kelas/update/{id}','KelasController@KelasUpdate');
Route::get('/kelas/delete/{id}','KelasController@KelasDelete');

Route::get('/petugas/index','PetugasController@PetugasIndex');
Route::post('/petugas/create','PetugasController@PetugasCreate');
Route::get('/petugas/edit/{id}','PetugasController@PetugasEdit');
Route::put('/petugas/update/{id}','PetugasController@PetugasUpdate');
Route::get('/petugas/delete/{id}','PetugasController@PetugasDelete');

Route::get('/spp/index','SppController@SppIndex');
Route::post('/spp/create','SppController@SppCreate');
Route::get('/spp/edit/{id}','SppController@SppEdit');
Route::put('/spp/update/{id}','SppController@SppUpdate');
Route::get('/spp/delete/{id}','SppController@SppDelete');

Route::get('/pembayaran/index','PembayaranController@PembayaranIndex');
Route::post('/pembayaran/create','PembayaranController@PembayaranCreate');
Route::get('/pembayaran/edit/{id}','PembayaranController@PembayaranEdit');
Route::put('/pembayaran/update/{id}','PembayaranController@PembayaranUpdate');
Route::get('/pembayaran/delete/{id}','PembayaranController@PembayaranDelete');
Route::get('/example/view', function () {
    return view('Example');
});

Route::prefix('api')->group(function () {
    
    Route::get('/example','ExampleController@ExIndex');
    Route::get('/example/delete/{id}','ExampleController@ExDelete');
    Route::post('/example/create','ExampleController@ExCreate');
    Route::get('/example/edit/{id}','ExampleController@ExEdit');
    Route::post('/example/update/{id}','ExampleController@ExUpdate');    

});