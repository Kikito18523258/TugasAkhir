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
Route::get('/kompetensiDasar/{k}/{m}/create', 'kompetensiDasarController@create');
Route::post('/kompetensiDasar/{k}/{m}/store', 'kompetensiDasarController@store');
//Route::post('/kompetensiDasar/{kelas}/{mapel}/{id}/update', 'kompetensiDasarController@update');

//RPP
Route::resource('/kompetensiDasar','kompetensiDasarController');
Route::resource('/rpp','rppController');
Route::post('rpp/showKD', 'rppController@showKD');
Route::get('/rpp/{id_rpp}/viewRpp', 'rppController@viewRpp');

//Evaluasi
Route::resource('/evaluasi','evaluasiController');
Route::get('/evaluasi/eval/{id_rpp}','evaluasiController@evaluasi');
Route::post('/evaluasi/eval/{id_rpp}/store','evaluasiController@storeEvaluasi');
   
