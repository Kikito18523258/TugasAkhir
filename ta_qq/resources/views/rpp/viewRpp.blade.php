@extends('layouts.app')
@section('content')
@php
use App\MataPelajaran;
use App\KompetensiDasar;
@endphp
<link rel="stylesheet" type="text/css" href="{{asset('css/sheets-of-paper-a4.css')}}">
 <div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">RPP</h1>  
            <a href="/rpp/{{$rpp->id_rpp}}/download" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background: #eb6440; color: white;"><i
                        class="fas fa-book fa-sm text-white-50"></i> Download</a>
            </div>
            <div class="document" style="color:black;">
                <div class="page" contenteditable="false"> 
                    <p><center><b>RENCANA PELAKSANAAN PEMBELAJARAN <br>(RPP)</b></center></p> 
                    <br>
                    <p>
                    <table style="margin-top: -5px;">
                        <tr>
                            <td>Satuan Pendidikan</td>
                            <td> : </td>
                            <td>{{$rpp->satuan_pendidikan}}</td>
                        </tr>
                        <tr>
                            <td>Kelas / Semester</td>
                            <td> : </td>
                            <td>{{$rpp->kelas}}</td>
                        </tr>
                        <tr>
                            <td>Tema</td>
                            <td> : </td>
                            <td>{{$findTema->judul_tema}}</td>
                        </tr>
                        <tr>
                            <td>Subtema</td>
                            <td> : </td>
                            <td>{{$findSubtema->judul}}</td>
                        </tr>
                        <tr>
                            <td>Muatan Terpadu</td>
                            <td> : </td>
                            <td>
                                <?php 
                                    $data =  json_decode($rpp->muatan); 
                                    $next =  json_decode($rpp->muatan);
                                    foreach ($data as $value)
                                    {   
                                        $mapel = MataPelajaran::findOrFail($value);
                                        echo $mapel->nama;
                                        if (next($next )) {
                                            echo ','; 
                                        }
                                    }
                                 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pembelajaran ke</td>
                            <td> : </td>
                            <td>{{$rpp->pembelajaran_ke}}</td>
                        </tr>
                        <tr>
                            <td>Alokasi Waktu</td>
                            <td> : </td>
                            <td>{{$rpp->alokasi_waktu}} hari</td>
                        </tr>
                    </table>
                    </p>
                    <p>
                        <b>A.KOMPETENSI INTI</b> <br> 
                        
                            <ol type="1">
                                @foreach($komInti as $ki)
                                <li>{{$ki->judul}}</li>
                            @endforeach
                            </ol>
                        
                    </p>
                    <p>
                        <b>B.KOMPETENSI DASAR DAN INDIKATOR</b> <br>
                        @php 
                            $data =  json_decode($rpp->muatan);
                        @endphp
                            
                            @foreach($data as $muatan)
                            @php
                            $no = 1;
                            $mapel = MataPelajaran::findOrFail($muatan);
                            @endphp
                         
                        Muatan: {{ $mapel->nama }} <br>
                        <table border="1" width="100%">
                            <tr>
                                <th>No</th>
                                <th>Kompetensi</th>
                                <th>Indikator</th>
                            </tr>
                                
                                    @php
                                        $data =  json_decode($rpp->kompetensi_dasar); 
                                        $komdas = KompetensiDasar::all();
                                        @endphp
                                        @foreach ($data as $key => $value)
                                            @if ($muatan == $key ) 
                                                @foreach ($value as $kd) 
                                                <tr>
                                                    <td width="10%">{{ substr($kd,0,4) }}</td>
                                                    <td> 
                                                        {{ substr($kd,3)}}
                                                    </td>
                                                    <td>
                                                        @foreach($komdas as $kd1) 
                                                            @if($kd1->kelas == $rpp->kelas)
                                                                @if($mapel->id == $kd1->mataPelajaran)
                                                                    @if(substr($kd1->indikator,0,3) == substr($kd,0,3)) 
                                                                    {!! nl2br(e($kd1->indikator))!!}   
                                                                    <br> 
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr> 
                                                @endforeach
                                            @endif
                                        @endforeach
                                
                        </table>
                        @endforeach
                    </p>  
                    <p>
                        <b>C.TUJUAN </b><br>
                        {{$rpp->tujuan}}
                    </ p> 
                    <p>
                        <b>D.MATERI </b><br>
                        {{$rpp->materi}}
                    </p> 
                    <p>
                        <b>E.PENDEKATAN & METODE</b><br>
                        {{$rpp->pendekatan_metode}}
                    </p> 
                    <p>
                        <b>F.KEGIATAN  PEMBELAJARAN </b><br>
                        <table border="1" width="100%">
                            <tr>
                                <th>Kegiatan</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Alokasi Waktu</th> 
                            </tr>
                            <tr>
                                <th>Kegiatan Pendahuluan</th>
                                <td>{{$rpp->kegiatan_pendahuluan}}</td>
                                <td>{{$rpp->waktu_pendahuluan}} menit</td>
                            </tr> 
                            <tr>
                                <th>Kegiatan Inti</th>
                                <td>{{$rpp->kegiatan_inti}}</td>
                                <td>{{$rpp->waktu_inti}} menit</td>
                            </tr> 
                            <tr>
                                <th>Kegiatan Penutup</th>
                                <td>{{$rpp->kegiatan_penutup}}</td>
                                <td>{{$rpp->waktu_penutup}} menit</td>
                            </tr> 
                        </table>
                    </p> 
                    <p>
                        <b>G.PENILAIAN</b><br>
                        {{$rpp->penilaian}}
                    </p> 
                    <p>
                        <b>H.Remedial dan Pengayaan</b><br>
                        {{$rpp->remedial_pengayaan}}
                    </p>
                    <p>
                        <b>I.SUMBER DAN  MEDIA</b><br>
                        {{$rpp->sumber_media}}
                    </p>  
                    <br><br>
                    <br><br>
                    <br><br>
                    <p>
                        <table width="100%" align="center">
                        <tr>
                            <td align="center">Mengetahui <br>Kepala Sekolah, </td>
                            <td align="center">…………………,...............<br>Guru Kelas 6,</td>
                        </tr>
                        <tr>
                            <td align="center"><br><br>Mumbruh Saptariningsih, S.Pd.SD.<br>NIP 19650521 198405 2 001</td>
                            <td align="center"><br><br>Rani Astuti, S.Pd.SD.<br>NIP 19821028 200801 2 024</td>
                        </tr>
                    </table>
                    </p>
                </div> 
                <script type="text/javascript">
                // window.print();

                var Config = {};
                Config.pixelsPerInch = 96;
                Config.pageHeightInCentimeter = 29.7; // must match 'min-height' from 'css/sheets-of-paper-*.css' being used
                Config.pageMarginBottomInCentimeter = 2; // must match 'padding-bottom' and 'margin-bottom' from 'css/sheets-of-paper-*.css' being used

                window.addEventListener("DOMContentLoaded", function () {
                    applyPageBreaks();
                });

                function applyPageBreaks() {
                    applyManualPageBreaks();
                    applyAutomaticPageBreaks(Config.pixelsPerInch, Config.pageHeightInCentimeter, Config.pageMarginBottomInCentimeter);

                    document.querySelectorAll(".document .page").forEach(function (element) {
                        if (!element.classList.contains("has-events")) {
                            element.addEventListener("blur", function () {
                                applyPageBreaks();
                            });

                            element.classList.add("has-events");
                        }
                    });
                }

                /* Applies any manual page breaks in preview mode (screen, non-print) where CSS Paged Media is not fully supported */
                function applyManualPageBreaks() {
                    var docs, pages, snippets;
                    docs = document.querySelectorAll(".document");

                    for (var d = docs.length - 1; d >= 0; d--) {
                        pages = docs[d].querySelectorAll(".page");

                        for (var p = pages.length - 1; p >= 0; p--) {
                            snippets = pages[p].children;

                            for (var s = snippets.length - 1; s >= 0; s--) {
                                if (snippets[s].classList.contains("page-break")) {
                                    pages[p].insertAdjacentHTML("afterend", "<div class=\"page\" contenteditable=\"false\"></div>");

                                    for (var n = snippets.length - 1; n > s; n--) {
                                        pages[p].nextElementSibling.insertBefore(snippets[n], pages[p].nextElementSibling.firstChild);
                                    }

                                    snippets[s].remove();
                                }
                            }
                        }
                    }
                }

                /* Applies (where necessary) automatic page breaks in preview mode (screen, non-print) where CSS Paged Media is not fully supported */
                function applyAutomaticPageBreaks(pixelsPerInch, pageHeightInCentimeter, pageMarginBottomInCentimeter) {
                    var inchPerCentimeter = 0.393701;
                    var pageHeightInInch = pageHeightInCentimeter * inchPerCentimeter;
                    var pageHeightInPixels = Math.ceil(pageHeightInInch * pixelsPerInch);
                    var pageMarginBottomInInch = pageMarginBottomInCentimeter * inchPerCentimeter;
                    var pageMarginBottomInPixels = Math.ceil(pageMarginBottomInInch * pixelsPerInch);
                    var docs, pages, snippets, pageCoords, snippetCoords;
                    docs = document.querySelectorAll(".document");

                    for (var d = docs.length - 1; d > 0; d--) {
                        pages = docs[d].querySelectorAll(".page");

                        for (var p = 0; p < pages.length; p++) {
                            if (pages[p].clientHeight > pageHeightInPixels) {
                                pages[p].insertAdjacentHTML("afterend", "<div class=\"page\" contenteditable=\"false\"></div>");
                                pageCoords = pages[p].getBoundingClientRect();
                                snippets = pages[p].querySelectorAll("h1, h2, h3, h4, h5, h6, p, ul, ol");

                                for (var s = snippets.length - 1; s >= 0; s--) {
                                    snippetCoords = snippets[s].getBoundingClientRect();

                                    if ((snippetCoords.bottom - pageCoords.top + pageMarginBottomInPixels) > pageHeightInPixels) {
                                        pages[p].nextElementSibling.insertBefore(snippets[s], pages[p].nextElementSibling.firstChild);
                                    }
                                }

                                pages = docs[d].querySelectorAll(".page");
                            }
                        }
                    }
                }
                </script>
            </div>
        </div> 

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@endsection
