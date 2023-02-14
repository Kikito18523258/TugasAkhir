@extends('layouts.app')
@section('content')

<!--Untuk Hide arrow pada input tahun ajaran!-->
<style type="text/css">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
} 
/* Script untuk menghilangkan anak panah pada input type number */
input[type=number] {
  -moz-appearance: textfield;
}
</style> 
<div class="align-items-center justify-content-between mb-10" style="margin: 4%;">
    <h1 class="h3  text-gray-800">Input Data</h1>  <br>
    <form method="POST" action="/kompetensiDasar/{{$k}}/{{$m}}/store">
        @csrf
        <div class="form-group row">
             <label class="col-sm-2 col-form-label">Kode Kompetensi Dasar</label>
                 <div class="col-sm-8">
                     <input type="text" name="kodeKD" class="form-control" required> 
                 </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Judul </label>
            <div class="col-sm-8">
              <input type="text" name="kompetensiDasar" class="form-control" required>
             </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mata Pelajaran </label>
            <div class="col-sm-8">
                <input type="text" name="mataPelajaran" readonly="" value="{{$mapel->nama}}" class="form-control">
             </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Indikator</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="indikator" required></textarea>
             </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-1"> 
                 <input type="number"name="kelas" class="form-control" readonly="" value="{{$k}}">  
            </div> 
        </div>  
        <button type="submit" class="btn" style="background: #eb6440; color: white;">
            Submit
        </button>
    </form>
</div>  
@endsection 