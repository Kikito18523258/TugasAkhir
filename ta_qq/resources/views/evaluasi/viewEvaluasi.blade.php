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

            	    <form method="POST" action="">
				        @csrf

				        <div class="form-group row">
				             <label class="col-sm-2 col-form-label">Masalah</label>
				                 <div class="col-sm-8">
				                     <textarea class="form-control" name="masalah">{{$eval->masalah}}</textarea>
				                 </div>
				        </div>
				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Ide Baru</label>
				            <div class="col-sm-8"> 
				              <textarea class="form-control" name="ide_baru">{{$eval->ide_baru}}</textarea>
				             </div>
				        </div>

				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Momen Spesial</label>
				            <div class="col-sm-8">
				                <textarea class="form-control" name="momen_spesial">{{$eval->momen_spesial}}</textarea>
				             </div>
				        </div> 

				        <div class="form-group row">
				             <label class="col-sm-2 col-form-label">Status</label>
				                 <div class="col-sm-8">
				                 	@if($eval->status==1)
				                     <input type="radio" name="status" value="1" checked="checked"> Terlaksana 
				                     <input type="radio" name="status" value="0"> Tidak Terlaksana
				                     <br>
				                    @else
				                    <input type="radio" name="status" value="1"> Terlaksana 
				                     <input type="radio" name="status" value="0" checked="checked"> Tidak Terlaksana
				                     @endif
				                 </div>
				        </div>

				          
				    </form>
 
            </div>
</div>
@endsection