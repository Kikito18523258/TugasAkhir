<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KompetensiDasar;
use App\Kelas;
use App\Indikator;
use App\MataPelajaran;

class KompetensiDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas,$mapel)
    { 
        $k = $kelas;
        $m = $mapel; 
        $showKompetensi = KompetensiDasar::where([['kelas', $kelas],['mataPelajaran', $mapel]])->get();  
        $namaMapel = MataPelajaran::FindOrFail($m);
        return view('kdasar.kompetensiDasars', compact('showKompetensi','k','m','namaMapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($k,$m)
    {
        $mapel = MataPelajaran::FindOrFail($m);
        return view('kdasar.create',compact('mapel','k','m'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$k,$m)
    { 

        $request -> validate([
            'kodeKD' => 'required', 
            'kompetensiDasar' => 'required',
            'mataPelajaran' => 'required',
            'indikator' => 'required', 
        ]);
        $save = kompetensiDasar::create([
                "kodeKD"=>$request->kodeKD,
                "kompetensiDasar"=>$request->kompetensiDasar,
                "mataPelajaran"=>$m,
                "indikator"=>$request->indikator,
                "kelas"=>$request->kelas, 
            ]);

        if($save){
           return redirect('/kompetensiDasar/'.$k.'/'.$m)->with('success', 'Data telah berhasil ditambah');
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
    public function show($kelas)
    {
        $k = $kelas;
        $showMateri = MataPelajaran::all();
        $showKompetensi = KompetensiDasar::where('kelas', $kelas)->get(); 
        return view('kdasar.mataPelajarans', compact('showMateri','k'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kelas,$mapel,$id)
    {

        $findID = KompetensiDasar::FindOrFail($id);
        return view('kdasar.editKompetensiDasar', compact('findID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request -> validate([
            'kodeKD' => 'required', 
            'kompetensiDasar' => 'required',
            'indikator' => 'required', 
        ]); 
        $datas = KompetensiDasar::FindOrFail($id); 
        $datas->kodeKD = $request->kodeKD;
        $datas->kompetensiDasar = $request->kompetensiDasar;
        $datas->indikator = $request->indikator; 
        $datas->save();
        return redirect('/kompetensiDasar/'.$datas->kelas.'/'.$datas->mataPelajaran)->with('success', 'Data telah berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = KompetensiDasar::FindOrFail($id);    
        $datas -> delete();
        return redirect('/kompetensiDasar/'.$datas->kelas.'/'.$datas->mataPelajaran)->with('success', 'Data telah berhasil dihapus');
    }
}
