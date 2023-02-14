<?php

use Illuminate\Support\Facades\Route;
use \App\User;

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

Route::group(['middleware'=>['web','auth']],function(){
/*	Route::get('/home',function(){
		if(Auth::user()->role==0){
			return view('home');
		}
		else if(Auth::user()->role==2){
			return view('home');
		}
		else{
			$users['users'] = User::all()->where('role',0);
			// return redirect('/dashboard');
			 return view('home',$users);
		}
	});*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inputDaftarTema', 'HomeController@inputDaftarTema');
Route::get('/programSemester', 'HomeController@programSemester');
Route::get('/inputRPP', 'HomeController@inputRPP');
Route::get('/kompetensiDasar/{kelas}', 'kompetensiDasarController@show');

//daftarAkun
Route::get('/daftarAkun', 'AkunController@index');
Route::delete('/daftarAkun/{id}/delete', 'AkunController@destroy');

//kompetensi dasar
Route::get('/kompetensiDasar/{kelas}/{mapel}', 'kompetensiDasarController@index'); 
Route::get('/kompetensiDasar/{kelas}/{mapel}/{id}/edit', 'kompetensiDasarController@edit');
Route::get('/kompetensiDasar/{k}/{m}/create', 'kompetensiDasarController@create');
Route::post('/kompetensiDasar/{k}/{m}/store', 'kompetensiDasarController@store');

Route::get('/register/create','RegisterController@create');
Route::post('/kompetensiDasar/{kelas}/{mapel}/{id}/update', 'kompetensiDasarController@update');

//kompetensi inti
Route::get('/kompetensiInti/{kelas}', 'kompetensiIntiController@index');
Route::get('/kompetensiInti/{k}/create', 'kompetensiIntiController@create');
Route::post('/kompetensiInti/{k}/store', 'kompetensiIntiController@store');
Route::delete('/kompetensiInti/{k}/{id}/delete', 'kompetensiIntiController@destroy');

//RPP
Route::get('/rpp/cari','rppController@cari');
Route::get('/rpp/cariEvaluasi','rppController@cariEvaluasi');
Route::get('/rpp/{id_rpp}/viewRpp', 'rppController@viewRpp');
Route::get('/pdf','rppController@generatepdf');
Route::get('/rpp/{id_rpp}/download','rppController@wordExport2');
Route::get('/verifRpp','rppController@verif');
Route::resource('/kompetensiDasar','kompetensiDasarController');
Route::resource('/rpp','rppController');
Route::post('rpp/showKD', 'rppController@showKD');
Route::post('rpp/showTema', 'rppController@showTema');
Route::post('rpp/showSubTema', 'rppController@showSubTema');
Route::post('rpp/showTemaEval', 'rppController@showTemaEval');
Route::post('rpp/showSubTemaEval', 'rppController@showSubTemaEval');
Route::post('/verifRpp/{id}','rppController@storeVerif');


//Evaluasi
//Route::resource('/evaluasi','evaluasiController');
Route::get('/evaluasi/cari','evaluasiController@cariEvaluasi');
Route::get('/evaluasi','evaluasiController@index');
Route::get('/evaluasi/{id_rpp}','evaluasiController@evaluasi');
Route::post('evaluasi/showSubTema', 'evaluasiController@showSubTema');
Route::post('/evaluasi/{id_rpp}/store','evaluasiController@storeEvaluasi');
Route::get('/evaluasi/{id_rpp}/viewEvaluasi','evaluasiController@viewEvaluasi');
});


   
