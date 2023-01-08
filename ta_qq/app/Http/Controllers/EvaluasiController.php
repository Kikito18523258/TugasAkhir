<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\KompetensiDasar;
use App\Rpp;
use App\Evaluasi;
use App\Tema;
use App\Subtema;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rpp = null; 
        $tema = Tema::all();
        $subtema = Subtema::all();
        $evaluasi = Evaluasi::all();
        return view('evaluasi.index',compact('rpp','tema','subtema','evaluasi'));
    }

    public function evaluasi($id_rpp)
    {
        $rpp = Rpp::FindOrFail($id_rpp);
        $checkEvaluasi = Evaluasi::where('id_rpp',$id_rpp)->first();
        return view('evaluasi.createEvaluasi',compact('rpp','id_rpp','checkEvaluasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeEvaluasi(Request $request,$id_rpp)
    {
        $request -> validate([

            'masalah' => 'required', 
            'ide_baru' => 'required',
            'momen_spesial' => 'required', 
            'status' => 'required',
        ]);
        $save = Evaluasi::create([
                "masalah"=>$request->masalah,
                "ide_baru"=>$request->ide_baru,
                "momen_spesial"=>$request->momen_spesial,
                "status"=>$request->status,
                "id_rpp"=>$id_rpp, 
            ]);

        if($save){
           return redirect('/evaluasi')->with('success', 'Data telah berhasil ditambah');
        }else{
           echo 'gagal save';
           die;
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function cariEvaluasi(Request $request)
    {
        $tema = $request->tema;
        $subtema = $request->subtema;
        

        $rpp = Rpp::where([['tema',$tema],['sub_tema',$subtema]])->get(); 
        // ddd($rpp2);

        $tema = Tema::all();
        $subtema = Subtema::all();
        $evaluasi = Evaluasi::all(); 
        
        return view('evaluasi.cariEvaluasi',compact('rpp','tema','subtema','evaluasi'));
    }

    public function viewEvaluasi($id)
    {
        $eval = Evaluasi::where('id_rpp',$id)->first();
        return view('evaluasi.viewEvaluasi',compact('eval'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showSubTema(Request $request) 
    { 
        // dd($request->id);
        $data['subtema'] = Subtema::where("id_tema",$request->id)->get(["judul", "id"]);     
        return response()->json($data);

    }
}
