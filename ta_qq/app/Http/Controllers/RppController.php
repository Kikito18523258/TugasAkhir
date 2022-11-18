<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\KompetensiDasar;
use App\Rpp;

class RppController extends Controller
{
public function index()
    {
    	$rpp = Rpp::all();
        return view('rpp.index',compact('rpp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$dataMapel = MataPelajaran::all();
        return view('rpp.create',compact('dataMapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
    	/*$request -> validate([
            'satuan_pendidikan' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
    		'tahun_ajaran' => 'required',
    		'tema' => 'required',
    		'sub_tema' => 'required',
    		'alokasi_waktu' => 'required',
    		'kompetensi_inti' => 'required',
    		'muatan' => 'required',
    		'kompetensi_dasar' => 'required',
    		'indikator' => 'required',
    		'tujuan' => 'required',
    		'materi' => 'required',
    		'pendekatan_metode' => 'required',
    		'kegiatan_pendahuluan' => 'required',
    		'waktu_pendahuluan' => 'required',
    		'kegiatan_inti' => 'required',
    		'waktu_inti' => 'required',
    		'kegiatan_penutup' => 'required',
    		'waktu_penutup' => 'required',
    		'remidiasi_pengayaan' => 'required',
    		'sumber_media' => 'required', 
        ]);*/
        $save = Rpp::create([
                "satuan_pendidikan"=>$request->satuan_pendidikan,
                "kelas"=>$request->kelas,
                "semester"=>$request->semester,
    			"tahun_ajaran"=>$request->t1."/".$request->t2,
    			"tema"=>$request->tema,
    			"sub_tema"=>$request->sub_tema,
    			"alokasi_waktu"=>$request->alokasi_waktu,
    			"kompetensi_inti"=>$request->kompetensi_inti,
    			"muatan"=>$request->muatan, 
    			"kompetensi_dasar"=> json_encode($request->kd),
    			"indikator"=>"asasas",
    			"tujuan"=>$request->tujuan,
    			"materi"=>$request->muatan,
    			"pendekatan_metode"=>$request->pendekatan_metode,
    			"kegiatan_pendahuluan"=>$request->kegiatan_pendahuluan,
    			"waktu_pendahuluan"=>$request->waktu_pendahuluan,
    			"kegiatan_inti"=>$request->kegiatan_inti,
    			"waktu_inti"=>$request->waktu_inti,
    			"kegiatan_penutup"=>$request->kegiatan_penutup,
    			"waktu_penutup"=>$request->waktu_penutup,
    			"penilaian"=>$request->penilaian,
    			"remediasi_pengayaan"=>$request->remediasi_pengayaan,
    			"sumber_media"=>$request->sumber_media,
            ]);

        if($save){
		   return redirect('/rpp')->with('success', 'Data telah berhasil ditambah');
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

	public function viewRpp($id)
    {
    	$rpp = Rpp::findOrFail($id);
    	$mapel = MataPelajaran::findOrFail($rpp->muatan);
        return view('rpp.viewRpp',compact('rpp','mapel'));
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
 
    public function showKD(Request $request) 
    { 
        $data['k_dasar'] = KompetensiDasar::where("MataPelajaran",$request->id) ->get(["kodeKD","kompetensiDasar", "id"]);     
        return response()->json($data);

    }
 
}
