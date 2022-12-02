<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KompetensiDasar;
use App\Kelas;
use App\KompetensiInti;

class kompetensiIntiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas)
    {
        $k = $kelas;
        $showKompetensiInti = KompetensiInti::where([['kelas', $kelas]])->get();
        return view('kinti.kompetensiIntis', compact('showKompetensiInti','k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($k)
    {
        return view('kinti.create',compact('k'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$k)
    {
        $request -> validate([
            'judul' => 'required', 
        ]);

        $save = kompetensiInti::create([
                "judul"=>$request->judul,
                "kelas"=>$request->k, 
            ]);

        if($save){
           return redirect('/kompetensiInti/'.$k)->with('success', 'Data telah berhasil ditambah');
        }else{
           echo 'gagal save';
           die;
        }
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($k,$id)
    {
        $datainti = KompetensiInti::FindOrFail($id);    
        $datainti -> delete();
        return redirect('/kompetensiInti/'.$datainti->kelas)->with('success', 'Data telah berhasil dihapus');
    }
}
