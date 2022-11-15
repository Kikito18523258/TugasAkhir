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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inputDaftarTema', 'HomeController@inputDaftarTema');
Route::get('/programSemester', 'HomeController@programSemester');
Route::get('/inputRPP', 'HomeController@inputRPP');
Route::get('/kompetensiDasar/{kelas}', 'kompetensiDasarController@show');

//kompetensi dasar
Route::get('/kompetensiDasar/{kelas}/{mapel}', 'kompetensiDasarController@index'); 
Route::get('/kompetensiDasar/{kelas}/{mapel}/{id}/edit', 'kompetensiDasarController@edit');
//Route::post('/kompetensiDasar/{kelas}/{mapel}/{id}/update', 'kompetensiDasarController@update');

Route::resource('/kompetensiDasar','kompetensiDasarController');
Route::resource('/rpp','rppController');
   
Route::post('rpp/showKD', 'rppController@showKD');