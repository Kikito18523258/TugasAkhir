@extends('layouts.app')
@section('content')

<!--Untuk Hide arrow pada input tahun ajaran!-->
<style type="text/css">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<div class="align-items-center justify-content-between mb-10" style="margin: 4%;">
    <form method="POST" action="{{ route('rpp.store') }}">
        @csrf
        <div class="form-group row">
             <label class="col-sm-2 col-form-label">Satuan Pendidikan</label>
                 <div class="col-sm-8">
                     <input type="text" name="satuan_pendidikan" class="form-control" readonly="" value="SD Negeri 1 Sruweng"> 
                 </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kelas </label>
            <div class="col-sm-8">
             <select class="form-control" name="kelas">
                @for($i=1; $i<7; $i++)
                 <option value="{{$i}}">Kelas {{$i}}</option>
                 @endfor
             </select>
             </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Semester </label>
            <div class="col-sm-8">
             <select class="form-control" name="semester"> 
                 <option value="1">Semester 1</option> 
                 <option value="2">Semester 2</option> 
             </select>
             </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Ajaran </label>
            <div class="col-sm-1"> 
                 <input type="number" max="2100" min="2010" name="t1" required="" class="form-control">  
            </div>
            <label class="col-sm-0 col-form-label">/</label>
            <div class="col-sm-1"> 
                 <input type="number" max="2100" min="2010" name="t2" required="" class="form-control">  
             </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tema </label>
            <div class="col-sm-8">
             <select class="form-control" name="tema"> 
                 <option value="1">Tema 1</option>  
             </select>
             </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Subtema </label>
            <div class="col-sm-8">
             <select class="form-control" name="sub_tema"> 
                 <option value="1">Subtema 1</option>  
             </select>
             </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pembelajaran Ke </label>
            <div class="col-sm-1"> 
                 <input type="number" required="" class="form-control" name="pembelajaran_ke">  
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alokasi Waktu(Hari)</label>
            <div class="col-sm-1"> 
                 <input type="number" required="" class="form-control" name="alokasi_waktu">  
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kompetensi Inti </label>
            <div class="col-sm-8"> 
                <select class="form-control" name="kompetensi_inti"> 
                    <option value="1">Subtema 1</option>  
                </select>
            </div> 
        </div>

            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Muatan </label>
                <div class="col-sm-8">  
                    <!-- checkbox -->
                    <div>  
                        @foreach ($dataMapel as $data) 
                        <input type="checkbox" id="mapel-dropdown<?= $data->id ?>" onchange="checkData(this)" name="muatan[]" value="<?= $data->id ?>"> {{ $data->nama }}
                        <br>
                        @endforeach 
                    </div> 
                </div>
            </div> 
            <div class="form-group row">
                <div id="tt" class="col-sm-2 col-form-label"></div>
                <div class="col-sm-8">
                    <!-- check -->
                    @foreach ($dataMapel as $data) 
                    <div id="kd-checkbox<?= $data->id ?>">
                    </div>
                    @endforeach
                </div>
                
            </div> 

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tujuan</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="tujuan"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Materi</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="materi"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pendekatan & Metode</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="pendekatan_metode"></textarea>
            </div> 
        </div>
        <br>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><h4>Kegiatan Pembelajaran</h4></label> 
        </div> 
        <div class="form-group row">
            <label class="col-sm-8"><b>Kegiatan Pendahuluan</b></label> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="kegiatan_pendahuluan"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alokasi Waktu(Menit)</label>
            <div class="col-sm-1"> 
                 <input type="number" required="" class="form-control" name="waktu_pendahuluan">  
            </div> 
        </div>
        <br>
        <div class="form-group row">
            <label class="col-sm-4"><b>Kegiatan Inti</b></label> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="kegiatan_inti"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alokasi Waktu(Menit)</label>
            <div class="col-sm-1"> 
                 <input type="number" required="" class="form-control" name="waktu_inti">  
            </div> 
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-4"><b>Kegiatan Penutup</b></label> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="kegiatan_penutup"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alokasi Waktu(Menit)</label>
            <div class="col-sm-1"> 
                 <input type="number" required="" class="form-control" name="waktu_penutup">  
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Penilaian</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="penilaian"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Remediasi & Pengayaan</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="remediasi_pengayaan"></textarea>
            </div> 
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sumber & Media</label>
            <div class="col-sm-8"> 
                <textarea class="form-control" name="sumber_media"></textarea>
            </div> 
        </div>

        <button type="submit" class="btn " style="background: #eb6440; color: white;">
            Submit RPP
        </button>
    </form>
</div> 
<script>
    // $(document).ready(function () {
    //     $('#mapel-dropdown').on('change', function () {
    //         $("#tt").html('<label>Kompetensi Dasar</label>');
    //         var idKD = this.value;

    //         console.log(idKD);
    //         $("#kd-checkbox").html('');
    //         $.ajax({
    //             url: "{{url('rpp/showKD')}}",
    //             type: "POST",
    //             data: {
    //                 id: idKD,
    //                 _token: '{{csrf_token()}}'
    //             },
    //             dataType: 'json',
    //             success: function (response) { 
    //                 $.each(response.k_dasar, function (key, value) {
    //                     $("#kd-checkbox").append('<input type="checkbox" name="kd[]" value="' + value.kodeKD+' '+value.kompetensiDasar + '"><label class="px-2">' + value.kodeKD+' '+value.kompetensiDasar + '</label> <br>');
    //                 });
    //             }
    //         });
    //     });

    // });

    function checkData(i){
        $("#tt").html('<label>Kompetensi Dasar</label>');
        var idKD = i.value;
        var cek = document.getElementById('mapel-dropdown'+idKD);
        if (cek.checked  ) {
            console.log('checked'+idKD);
            $("#kd-checkbox" + idKD).html('');
            $.ajax({
                type: "POST",
                url: "{{url('rpp/showKD')}}",
                data: {
                    id: idKD,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) { 
                    $.each(response.k_dasar, function (key, value) {
                        $("#kd-checkbox" + idKD).append('<input type="checkbox" id="content'+idKD+'" name="kd['+ idKD +'][]" value="' + value.kodeKD+' '+value.kompetensiDasar + '"><label class="px-2">' + value.kodeKD+' '+value.kompetensiDasar + '</label> <br>');
                    });
                }
            });
        }else{
            console.log('#remove'+idKD);
            $("#kd-checkbox" + idKD).html('');
        }

    }
</script>

@endsection 