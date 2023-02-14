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
				                     <textarea class="form-control" name="masalah" required>@if($checkEvaluasi!=null){{$checkEvaluasi->masalah}}@endif</textarea>
				                 </div>
				        </div>
				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Ide Baru</label>
				            <div class="col-sm-8">
				              <textarea class="form-control" name="ide_baru" required>@if($checkEvaluasi!=null){{$checkEvaluasi->ide_baru}}@endif</textarea>
				             </div>
				        </div>

				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Momen Spesial</label>
				            <div class="col-sm-8">
				                <textarea class="form-control" name="momen_spesial" required>@if($checkEvaluasi!=null){{$checkEvaluasi->momen_spesial}}@endif</textarea>
				             </div>
				        </div>  
				        <input type="hidden" name="pembelajaran_ke" value="{{$rpp->pembelajaran_ke}}">

				        <div class="form-group row">
				             <label class="col-sm-2 col-form-label">Status</label>
				                 <div class="col-sm-8">  
				                 	@if($checkEvaluasi!=null)
					                 	@if($checkEvaluasi->status == 1)
					                 		<input type="radio" name="status" value="1" checked="checked"> Terlaksana <br>
					                 		<input type="radio" name="status" value="0"> Tidak Terlaksana
					                 	@elseif($checkEvaluasi->status == 0)
					                 		<input type="radio" name="status" value="1"> Terlaksana <br>
					                 		<input type="radio" name="status" value="0" checked="checked"> Tidak Terlaksana
					                 	@endif 
					                 	@else
					                 	<input type="radio" name="status" value="1"> Terlaksana <br>
					                 	<input type="radio" name="status" value="0"> Tidak Terlaksana
					                 @endif
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