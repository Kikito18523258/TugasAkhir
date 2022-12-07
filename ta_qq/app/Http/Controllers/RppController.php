<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\KompetensiDasar;
use App\Rpp;
use App\Tema;
use App\Subtema;
use App\KompetensiInti;
use PhpOffice\PhpWord\TemplateProcessor;

class RppController extends Controller
{
public function index()
    {
    	$rpp = Rpp::all();
        $tema = Tema::all();
        $subtema = Subtema::all();
        return view('rpp.index',compact('rpp','tema','subtema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tema = Tema::all();
        $subtema = Subtema::all();
    	$dataMapel = MataPelajaran::all();
        $kompetensi_inti = KompetensiInti::all();
        return view('rpp.create',compact('dataMapel','tema','subtema','kompetensi_inti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $save = Rpp::create([
                "satuan_pendidikan"=>$request->satuan_pendidikan,
                "kelas"=>$request->kelas,
                "semester"=>$request->semester,
    			"tahun_ajaran"=>$request->t1."/".$request->t2,
    			"tema"=>$request->tema,
    			"sub_tema"=>$request->sub_tema,
    			"pembelajaran_ke"=>$request->pembelajaran_ke,
    			"alokasi_waktu"=>$request->alokasi_waktu,
    			"kompetensi_inti"=>$request->kompetensi_inti,
    			"muatan"=> json_encode($request->muatan), 
    			"kompetensi_dasar"=> json_encode($request->kd),
    			"tujuan"=>$request->tujuan,
    			"materi"=>$request->materi,
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
        $komInti = KompetensiInti::all();
    	// $mapel = MataPelajaran::findOrFail($rpp->muatan);
        return view('rpp.viewRpp',compact('rpp','komInti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_tema = Subtema::all();
        $rpp = Rpp::findOrFail($id);
        $dataMapel = MataPelajaran::all();
        $kompetensi_inti = KompetensiInti::all();
        return view('rpp.editRpp', compact('rpp','sub_tema','dataMapel','kompetensi_inti'));
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
        $datas = Rpp::FindOrFail($id); 

        $datas->satuan_pendidikan = $request->satuan_pendidikan;
        $datas->kelas = $request->kelas;
        $datas->semester = $request->semester;
        $datas->tahun_ajaran = $request->t1."/".$request->t2;
        $datas->tema = $request->tema;
        $datas->sub_tema = $request->sub_tema;
        $datas->pembelajaran_ke = $request->pembelajaran_ke;
        $datas->alokasi_waktu = $request->alokasi_waktu;
        $datas->kompetensi_inti = $request->kompetensi_inti;
        $datas->muatan = json_encode($request->muatan); 
        $datas->kompetensi_dasar = json_encode($request->kd);
        $datas->indikator = "indikator";
        $datas->tujuan = $request->tujuan;
        $datas->materi = $request->materi;
        $datas->pendekatan_metode = $request->pendekatan_metode;
        $datas->kegiatan_pendahuluan = $request->kegiatan_pendahuluan;
        $datas->waktu_pendahuluan = $request->waktu_pendahuluan;
        $datas->kegiatan_inti = $request->kegiatan_inti;
        $datas->waktu_inti = $request->waktu_inti;
        $datas->kegiatan_penutup = $request->kegiatan_penutup;
        $datas->waktu_penutup = $request->waktu_penutup;
        $datas->penilaian = $request->penilaian;
        $datas->remediasi_pengayaan = $request->remediasi_pengayaan;
        $datas->sumber_media = $request->sumber_media;

        $datas->save();
        return redirect('/rpp')->with('success', 'Data telah berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datad = Rpp::FindOrFail($id);
        $datad -> delete();
        return redirect('/rpp')->with('success', 'Data berhasil dihapus');
    } 
 
    public function showKD(Request $request) 
    { 
    	// dd($request->id);
        $data['k_dasar'] = KompetensiDasar::where("MataPelajaran",$request->id)->get(["kodeKD","kompetensiDasar", "id"]);     
        return response()->json($data);

    }

    public function showSubTema(Request $request) 
    { 
        // dd($request->id);
        $data['subtema'] = Subtema::where("id_tema",$request->id)->get(["judul", "id"]);     
        return response()->json($data);

    }

    public function wordExport(Request $request,$id)
    {
        $rpp = Rpp::findOrFail($id); 
        $komInti = KompetensiInti::all();
        $muatan = null;
        $kompetensi_inti[] = null;
        $data =  json_decode($rpp->muatan); 
        $next =  json_decode($rpp->muatan);
        foreach ($data as $value)
        {   
            $mapel = MataPelajaran::findOrFail($value);
            $muatan .= $mapel->nama;
            if (next($next )) {
                $muatan.= ','; 
            }
        }

        foreach($komInti as $ki){
            $kompetensi_inti[].= $ki->judul. "\r\n";
        }

        //ddd($kompetensi_inti);
        $templateProcessor = new TemplateProcessor('word/template.docx');
        $templateProcessor->setValue('satuan_pendidikan', $rpp->satuan_pendidikan);
        $templateProcessor->setValue('kelas', $rpp->kelas);
        $templateProcessor->setValue('semester', $rpp->semester);
        $templateProcessor->setValue('tahun_ajaran', $rpp->tahun_ajaran);
        $templateProcessor->setValue('tema', $rpp->tema);
        $templateProcessor->setValue('muatan', $muatan);
        $templateProcessor->setValue('sub_tema', $rpp->sub_tema);
        $templateProcessor->setValue('pembelajaran_ke', $rpp->pembelajaran_ke);
        $templateProcessor->setValue('alokasi_waktu', $rpp->alokasi_waktu);
        $templateProcessor->setValue('kompetensi_inti', $kompetensi_inti);
        $templateProcessor->setValue('kompetensi_dasar', $rpp->kompetensi_dasar);
        $templateProcessor->setValue('indikator', $rpp->indikator);
        $templateProcessor->setValue('tujuan', $rpp->tujuan);
        $templateProcessor->setValue('materi', $rpp->materi);
        $templateProcessor->setValue('pendekatan_metode', $rpp->pendekatan_metode);
        $templateProcessor->setValue('kegiatan_pendahuluan', $rpp->kegiatan_pendahuluan);
        $templateProcessor->setValue('waktu_pendahuluan', $rpp->waktu_pendahuluan);
        $templateProcessor->setValue('kegiatan_inti', $rpp->kegiatan_inti);
        $templateProcessor->setValue('waktu_inti', $rpp->waktu_inti);
        $templateProcessor->setValue('kegiatan_penutup', $rpp->kegiatan_penutup);
        $templateProcessor->setValue('waktu_penutup', $rpp->waktu_penutup);
        $templateProcessor->setValue('penilaian', $rpp->penilaian);
        $templateProcessor->setValue('remediasi_pengayaan', $rpp->remediasi_pengayaan);
        $templateProcessor->setValue('sumber_media', $rpp->sumber_media);

        $fileName = $rpp->id_rpp.' '.date('h-i-s') ;
        $templateProcessor->saveAs($fileName. '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
 
}
