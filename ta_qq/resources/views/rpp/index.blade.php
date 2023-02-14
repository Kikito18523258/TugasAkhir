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
                <a href="/rpp/create" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background: #eb6440; color: white;"><i
                        class="fas fa-book fa-sm text-white-50"></i> Tambah Data</a>      
            </div>
            <div>
                <form class="form-inline" method="GET" action="/rpp/cari">

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
                    
                }
            }); 
        });
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
</script>

<script type="text/javascript">
    
</script>
@endsection