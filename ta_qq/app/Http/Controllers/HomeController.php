<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\KompetensiDasar;
use App\Rpp;
use App\Evaluasi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas1 = Rpp::where('kelas','=','1')->count();
        $kelas2 = Rpp::where('kelas','=','2')->count();
        $kelas3 = Rpp::where('kelas','=','3')->count();
        $kelas4 = Rpp::where('kelas','=','4')->count();
        $kelas5 = Rpp::where('kelas','=','5')->count();
        $kelas6 = Rpp::where('kelas','=','6')->count();

        $verif1 = Rpp::where('verifikasi','=','6')->count();
        $verif2 = Rpp::where('verifikasi','=','5')->count();
        $verif3 = Rpp::where('verifikasi','=','4')->count();
        $verif4 = Rpp::where('verifikasi','=','3')->count();
        $verif5 = Rpp::where('verifikasi','=','2')->count();
        $verif6 = Rpp::where('verifikasi','=','1')->count();

        $eval6 = Evaluasi::count();

        $terlak6 = Evaluasi::where('status','=','1')->count();

        return view('home',compact('kelas1','kelas2','kelas3','kelas4','kelas5','kelas6','verif1','verif2','verif3','verif4','verif5','verif6','eval6','terlak6'));
    }
}
