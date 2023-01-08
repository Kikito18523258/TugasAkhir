
@php
use App\Evaluasi;
@endphp
@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Evaluasi</h1>  
            </div>
            <div>
                
                <form class="form-inline" method="GET" action="/evaluasi/cari">

                  <div class="form-group mb-2">
                    <select class="form-control" id="tema-dropdown" name="tema">
                        <option>Pilih Tema</option>
                        @foreach($tema as $t)
                            <option value="{{$t->id}}">{{$t->judul_tema}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group mx-sm-3 mb-2"> 
                    <select class="form-control" id="subtema-dropdown" name="subtema">
                        <option>Pilih Subtema</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Cari</button>
                </form>

                <table border="1" class="table" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Pembelajaran ke</th> 
                            <th width="15%">Masalah</th>
                            <th width="15%">Ide Baru</th>
                            <th width="15%">Momen Spesial</th>
                            <th width="10%">Status</th> 
                            <th width="7%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rpp as $rppList)
                        <tr>
                            <td>{{$loop->iteration}}</td> 
                            <!-- <td>
                                @foreach($tema as $t)
                                @if($rppList->tema== $t->id)
                                    {{$t->judul_tema}}
                                @endif
                                @endforeach
                            </td>

                            <td>
                                @foreach($subtema as $st)
                                @if($rppList->sub_tema== $st->id)
                                    {{$st->judul}}
                                @endif
                                @endforeach
                            </td> -->

                            <td>{{$rppList->pembelajaran_ke}}</td>
                            @php
                            $evaluasiCari = Evaluasi::all();
                            $dataKosong = true;
                            @endphp 

                            <!-- Untuk mendeteksi Kolom kosong -->
                            @foreach($evaluasiCari as $es)  
                                @if($es->id_rpp == $rppList->id_rpp && $es->pembelajaran_ke == $rppList->pembelajaran_ke)
                                {{$dataKosong = false}} 
                                @endif 
                            @endforeach
                            
                            <!-- Untuk menampilkan data apakah kosong atau tidak -->
                            @foreach($evaluasiCari as $es)  
                                @if($dataKosong == false)
                                    @if($es->id_rpp == $rppList->id_rpp && $es->pembelajaran_ke == $rppList->pembelajaran_ke)
                                    <td>{{$es->masalah}}</td> 
                                    <td>{{$es->ide_baru}}</td> 
                                    <td>{{$es->momen_spesial}}</td>  
                                    @break
                                    @endif
                                @else
                                    <td>Belum ada laporan</td> 
                                    <td>Belum ada laporan</td> 
                                    <td>Belum ada laporan</td> 
                                @break
                                @endif
                            @endforeach
                            <td>
                                @foreach($evaluasi as $e)
                                @if($e->id_rpp==$rppList->id_rpp)  
                                    @if($e->status==1)
                                        Terlaksana
                                    @elseif($e->status==0)
                                        Tidak Terlaksana
                                    @endif
                                @endif
                                @endforeach
                            </td>

                            <td align="center">
                                <form method="post" action="{{ route('rpp.destroy',$rppList->id_rpp)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info btn-sm" href="/evaluasi/{{$rppList->id_rpp}}"><i class="fas fa-fw fa-pen"></i></a> 
                                    <!-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></button> -->
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
 
            </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tema-dropdown').on('change', function () { 
            var idSubTema = this.value;
            $("#subtema-dropdown").html('');
            $.ajax({
                url: "{{url('evaluasi/showSubTema')}}",
                type: "POST",
                data: {
                    id: idSubTema,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) { 
                    $.each(response.subtema, function (key, value) {
                        $("#subtema-dropdown").append('<option class="form-control" value="'+value.id+'"><label class="px-2">'+value.judul+ '</option>');
                    });
                }
            }); 
        });
    });
</script>
@endsection