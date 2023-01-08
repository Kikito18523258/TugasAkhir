@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Evaluasi</h1>  
            </div>
            <div>

            	    <form method="POST" action="/evaluasi/{{$id_rpp}}/store">
				        @csrf
				        <div class="form-group row">
				             <label class="col-sm-2 col-form-label">Masalah</label>
				                 <div class="col-sm-8">
				                     <textarea class="form-control" name="masalah">@if($checkEvaluasi!=null){{$checkEvaluasi->masalah}}@endif</textarea>
				                 </div>
				        </div>
				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Ide Baru</label>
				            <div class="col-sm-8">
				              <textarea class="form-control" name="ide_baru">@if($checkEvaluasi!=null){{$checkEvaluasi->ide_baru}}@endif</textarea>
				             </div>
				        </div>

				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Momen Spesial</label>
				            <div class="col-sm-8">
				                <textarea class="form-control" name="momen_spesial">@if($checkEvaluasi!=null){{$checkEvaluasi->momen_spesial}}@endif</textarea>
				             </div>
				        </div> 

				        <div class="form-group row">
				             <label class="col-sm-2 col-form-label">Status</label>
				                 <div class="col-sm-8">  
				                     <input type="radio" name="status" value="1"> Terlaksana <br>
				                     <input type="radio" name="status" value="0"> Tidak Terlaksana
				                     <br> 
				                 </div>
				        </div>

				         
				        <button type="submit" class="btn bg-primary" style="color:white;">
				            Submit
				        </button>
				    </form>
 
            </div>
</div>
@endsection