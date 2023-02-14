@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">RPP</h1>
                  
            </div>
            <div>

            <form class="form-inline" method="GET" action="/rpp/cariEvaluasi">

                <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" id="kelas-dropdown" name="kelas">
                        <option>Pilih Kelas</option>
                            @foreach($kelas as $k)
                            <option value="{{$k->id}}">{{$k->nama_kelas}}</option> 
                            @endforeach
                    </select>
                </div>

                <div class="form-group mb-2">
                    <select class="form-control" id="tema-dropdown" name="tema">
                        <option>Pilih Tema</option>  
                    </select>
                </div>

                <div class="form-group mx-sm-3 mb-2"> 
                    <select class="form-control" id="subtema-dropdown" name="subtema">
                        <option>Pilih Subtema</option>
                    </select>
                </div>
                  <button type="submit" class="btn btn-primary mb-2">Cari</button>
            </form>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th width="8%">No</th>
                            <th width="10%">Kelas</th>
                            <th width="30%">Tema</th>
                            <th width="25%">Subtema</th> 
                            <th width="15%">Pembelajaran ke</th> 
                            <th width="10%">Status</th>
                            <th width="10%">Tindakan</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rpp as $rppList)
                        <tr>
                            <td>{{$loop->iteration}}</td> 
                            <td>{{$rppList->kelas}}</td>
                            <td>
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
                            </td>
                            <td>{{$rppList->pembelajaran_ke}}</td>
                            <td>
                                @if($rppList->verifikasi==0)
                                <form method="post" action="/verifRpp/{{$rppList->id_rpp}}">
                                    @csrf
                                    @method('POST') 
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin ingin memverifikasi?')">Verifikasi</button>
                                </form>
                                @elseif($rppList->verifikasi==1)
                                <b style="color:green">Terverifikasi</b>
                                @endif
                            </td> 
                            <td>
                                <form method="post" action="{{ route('rpp.destroy',$rppList->id_rpp)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-secondary btn-sm" href="/rpp/{{$rppList->id_rpp}}/viewRpp"><i class="fas fa-fw fa-eye"></i></a> 
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
        $('#kelas-dropdown').on('change', function () { 
            var idTema = this.value;
            $("#tema-dropdown").html('<option>Pilih Tema</option>');
            $.ajax({
                url: "{{url('rpp/showTema')}}",
                type: "POST",
                data: {
                    id: idTema,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) { 
                    $.each(response.tema, function (key, value) {
                        $("#tema-dropdown").append('<option class="form-control" value="'+value.id+'"><label class="px-2">'+value.judul_tema+ '</option>');
                    });
                    $(document).ready(function () {
                        $('#tema-dropdown').on('change', function () { 
                            var idSubTema = this.value;
                            $("#subtema-dropdown").html('<option>Pilih Subtema</option>');
                            $.ajax({
                                url: "{{url('rpp/showSubTema')}}",
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
                }
            }); 
        });
    });
</script>
@endsection