<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\KompetensiDasar;
use App\Rpp;
use App\Tema;
use App\Subtema;
use App\KompetensiInti;
use App\Kelas;
use PhpOffice\PhpWord\TemplateProcessor;

class RppController extends Controller
{
	public function index()
    {
    	$rpp = null;
        $tema = Tema::all();
        $subtema = Subtema::all();
        $kelas = Kelas::all(); 
        return view('rpp.index',compact('rpp','tema','subtema','kelas'));
    }
    

    public function verif()
    {
    	$rpp = Rpp::all();
        $tema = Tema::all();
        $subtema = Subtema::all();
        $kelas = Kelas::all();
        return view('rpp.verif',compact('rpp','tema','subtema','kelas'));
    }
    
    public function storeVerif($id)
    {
 		$datas = Rpp::FindOrFail($id);
 		$datas->verifikasi = 1;
 		$datas->save();
 		return redirect('/verifRpp')->with('success', 'Data telah berhasil diedit');
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

    public function cari(Request $request)
    {
        $tema = $request->tema;
        $subtema = $request->subtema;
        $kelas = Kelas::all();
        $judultema = Tema::findOrFail($tema);   
        $judulsubtema = Subtema::findOrFail($subtema);
        

        $rpp = Rpp::where([['tema',$tema],['sub_tema',$subtema]])->get();
        $tema = Tema::all();
        $subtema = Subtema::all();
        return view('rpp.cari',compact('rpp','tema','subtema','judultema','judulsubtema','kelas'));
    }

    public function cariEvaluasi(Request $request)
    {
        $tema = $request->tema;
        $subtema = $request->subtema;
        $kelas = Kelas::all(); 


        $rpp = Rpp::where([['tema',$tema],['sub_tema',$subtema]])->get();
        $tema = Tema::all();
        $subtema = Subtema::all();
        return view('rpp.verif',compact('rpp','tema','subtema','kelas'));
    }

	public function viewRpp($id)
    {
    	$rpp = Rpp::findOrFail($id);
        $komInti = KompetensiInti::all();
        $findTema = Tema::findOrFail($rpp->tema); 
  		$findIDSubtema = Rpp::where("id_rpp",$id)->first();
        $findSubtema = Subtema::where("id",$findIDSubtema->sub_tema)->first();
        //dd($findIDSubtema);
        return view('rpp.viewRpp',compact('rpp','komInti','findTema','findSubtema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$tema = Tema::all();
        $subtema = Subtema::all();
        $rpp = Rpp::findOrFail($id);
        $dataMapel = MataPelajaran::all();
        $kompetensi_inti = KompetensiInti::all();
        return view('rpp.editRpp', compact('rpp','tema','subtema','dataMapel','kompetensi_inti'));
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

    public function showTema(Request $request) 
    { 
        // dd($request->id);
        $data['tema'] = Tema::where("kelas",$request->id)->get(["judul_tema", "id"]);     
        return response()->json($data);

    }

    public function showSubTema(Request $request) 
    { 
        // dd($request->id);
        $data['subtema'] = Subtema::where("id_tema",$request->id)->get(["judul", "id"]);     
        return response()->json($data);

    }

    public function showSubTemaEval(Request $request) 
    { 
        // dd($request->id);
        $data['subtema'] = Subtema::where("id_tema",$request->id)->get(["judul", "id"]);     
        return response()->json($data);

    }
 
  	public function wordExport2($id){
  		$komInti = KompetensiInti::all();
  		$rpp = Rpp::findOrFail($id); 
  		$findTema = Tema::findOrFail($rpp->tema);
  		$findIDSubtema = Rpp::where("id_rpp",$id)->first();
        $findSubtema = Subtema::where("id",$findIDSubtema->sub_tema)->first();
  		$muatan = null; 
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
 		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->setDefaultFontSize(11);
		$listAngka = 'multilevel list 1';
		$listHuruf = 'multilevel list 2';
		$fontStyle = new \PhpOffice\PhpWord\Style\Font();
		$fontStyle->setBold(true);
		$fontStyle->setName('Tahoma');
		$fontStyle->setSize(13);

		$phpWord->addNumberingStyle(
		    $listAngka,
		    array(
		        'type'   => 'multilevel',
		        'levels' => array(
		            array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 360, 
		                  'start' => 1,'size'=>11)
		        ),
		    )
		);

		$phpWord->addNumberingStyle(
		    $listHuruf,
		    array(
		        'type'   => 'multilevel',
		        'levels' => array(
		            array('format' => 'upperLetter','text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360, 'fontStyle'=> 'bold'), 
		        ),
		    )
		);
		// Adding an empty Section to the document...
		$section = $phpWord->addSection();  
		$phpWord->addFontStyle('r2Style', array('name' => 'Arial','bold'=>true,'size'=>11));
		$phpWord->addParagraphStyle('p2Style', array('align'=>'center', 'spaceAfter'=>100));

		//ISI DI WORD
		$section->addText('RENCANA PELAKSANAAN PEMBELAJARAN (RPP)', 'r2Style', 'p2Style');   
		$section->addTextBreak();
		$fancyTableStyleName = 'Fancy Table';
		$fancyTableStyle = array( 'cellMargin' => 0, 'cellSpacing' => 0); 
		$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle);
		
			$table = $section->addTable($fancyTableStyleName);
			$table->addRow();
			$table->addCell()->addText('Satuan Pendidikan');
			$table->addCell()->addText(' : '.$rpp->satuan_pendidikan); 
		    $table->addRow();
		    $table->addCell()->addText("Kelas/Semester");
		    $table->addCell()->addText(' : '.$rpp->kelas.'/'.$rpp->semester);
		    $table->addRow();
		    $table->addCell()->addText("Tema");
		    $table->addCell()->addText(' : '.$findTema->judul_tema);  
		    $table->addRow();
		    $table->addCell()->addText("Subtema");
		    $table->addCell()->addText(' : '.$findSubtema->judul); 
		    $table->addRow();
		    $table->addCell()->addText("Muatan");
		    $table->addCell()->addText(' : '.$muatan); 
		    $table->addRow();
		    $table->addCell()->addText("Pembelajaran ke");
		    $table->addCell()->addText(' : '.$rpp->pembelajaran_ke); 
		    $table->addRow();
		    $table->addCell()->addText("Alokasi waktu");
		    $table->addCell()->addText(' : '.$rpp->alokasi_waktu.' hari');  

			$section->addTextBreak();  
            $section->addListItem('KOMPETENSI INTI' ,0, 'r2Style', $listHuruf);  
            foreach($komInti as $ki){
	            $section->addListItem($ki->judul ,0, null, $listAngka); 
	        } 
	        $section->addTextBreak();

            $section->addListItem('KOMPETENSI DASAR DAN INDIKATOR' ,0, 'r2Style', $listHuruf); 
            $section->addListItemRun(0, 'r2Style', $listHuruf); 



            $data =  json_decode($rpp->muatan); 
                            foreach($data as $muatan)
                            {
								$mapel = MataPelajaran::findOrFail($muatan);
								$section->addText('Muatan : '.$mapel->nama); 
								$fancyTableStyle2 = array('borderSize'=> 0, 'cellMargin' => 10, 'cellSpacing' => 10); 
								$phpWord->addTableStyle('myTable', $fancyTableStyle2);

								$table2 = $section->addTable('myTable');
								$table2->addRow();
								$table2->setWidth(100 * 50);
								$table2->addCell(500)->addText('No','r2Style');
								$table2->addCell()->addText('Kompetensi','r2Style');
								$table2->addCell()->addText('Indikator','r2Style');
								$data =  json_decode($rpp->kompetensi_dasar); 
								$indikatorKosong=true;
                                $komdas = KompetensiDasar::all(); 
                                foreach ($data as $key => $value){
                                	if ($muatan == $key ){
                                		$section->addTextBreak();
										foreach ($value as $kd) { 
											$table2->addRow();
											$table2->addCell()->addText(substr($kd,0,4));
											$table2->addCell()->addText(substr($kd,3));
                                                foreach($komdas as $kd1){
                                                	if($kd1->kelas == $rpp->kelas)
                                                    {

                                                    	if($mapel->id == $kd1->mataPelajaran){  
                                                    		if(substr($kd1->indikator,0,3) == substr($kd,0,3)){
                                                    			$table2->addCell()->addText($kd1->indikator);
                                                    			$indikatorKosong=false;
                                                    		}  
                                                    		
                                                    	} 
                                                            
                                                    } 
                                                }
                                                if($indikatorKosong==true){
				                                	$table2->addCell()->addText('Data kosong');
				                                } 
                                        }
                                    }    
                                }    
           
                            } 
                            
            $section->addListItem('TUJUAN' ,0, 'r2Style', $listHuruf); 
            $section->addText($rpp->tujuan); 
            $section->addTextBreak();

            $section->addListItem('MATERI' ,0, 'r2Style', $listHuruf); 
            $section->addText($rpp->materi); 
            $section->addTextBreak();

            $section->addListItem('PENDEKATAN DAN METODE' ,0, 'r2Style', $listHuruf); 
            $section->addText($rpp->pendekatan_metode); 
            $section->addTextBreak();

			$section->addListItem('KEGIATAN PEMBELAJARAN' ,0, 'r2Style', $listHuruf);  
            $table2 = $section->addTable('myTable'); 
            $table2->setWidth(100 * 50);
			$table2->addRow();
			$table2->addCell(1000)->addText('Kegiatan','r2Style');
			$table2->addCell()->addText('Deskripsi Kegiatan','r2Style');
			$table2->addCell()->addText('Alokasi Waktu','r2Style');
			$table2->addRow();
			$table2->addCell()->addText('Kegiatan Pendahuluan','r2Style');
			$table2->addCell()->addText($rpp->kegiatan_pendahuluan);
			$table2->addCell()->addText($rpp->waktu_pendahuluan);
			$table2->addRow();
			$table2->addCell()->addText('Kegiatan Inti','r2Style');
			$table2->addCell()->addText($rpp->kegiatan_inti);
			$table2->addCell()->addText($rpp->waktu_inti);
			$table2->addRow();
			$table2->addCell()->addText('Kegiatan Penutup','r2Style');
			$table2->addCell()->addText($rpp->kegiatan_penutup);
			$table2->addCell()->addText($rpp->waktu_penutup);
			$section->addTextBreak();


            $section->addListItem('PENILAIAN' ,0, 'r2Style', $listHuruf); 
            $section->addText($rpp->penilaian); 
            $section->addTextBreak();

            $section->addListItem('Remedial dan Pengayaan' ,0, 'r2Style', $listHuruf); 
            $section->addText($rpp->remediasi_pengayaan); 
            $section->addTextBreak();

            $section->addListItem('SUMBER DAN MEDIA' ,0, 'r2Style', $listHuruf); 
            $section->addText($rpp->sumber_media); 

            $section->addTextBreak(4);
            $phpWord->addTableStyle('myTable2', $fancyTableStyle);
            $table2 = $section->addTable('myTable2',array('border' => 0, ));
            $table2->setWidth(100 * 50);
			$table2->addRow();
			$table2->addCell()->addText('Mengetahui <w:br />Kepala Sekolah,',null, array('align' => 'center')); 
			$table2->addCell()->addText('...................... <w:br /> Guru Kelas '.$rpp->kelas,null,array('align' => 'center'));
			$table2->addRow();
			$table2->addCell(10*100)->addText(''); 
			$table2->addCell(10*100)->addText('');
			$table2->addRow();
			$table2->addCell()->addText( 'Mumbruh Saptariningsih, S.Pd.SD. <w:br /> NIP 19650521 198405 2 001',null,array('align' => 'center')); 
			$table2->addCell()->addText('Rani Astuti, S.Pd.SD. <w:br /> NIP 19821028 200801 2 024',null,array('align' => 'center'));

		
		/*$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
		$myTextElement->setFontStyle($fontStyle);*/

		// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		try {
            $objWriter->save(storage_path('Data RPP.docx'));
    	} catch (Exception $e) {
    	
    	}
        return response()->download(storage_path('Data RPP.docx'));
 	}
}
