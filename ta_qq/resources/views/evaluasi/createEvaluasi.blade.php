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
            	    <form method="POST" action="/evaluasi/eval/{{$id_rpp}}/store">
				        @csrf
				        <div class="form-group row">
				             <label class="col-sm-2 col-form-label">Masalah</label>
				                 <div class="col-sm-8">
				                     <textarea class="form-control" name="masalah"></textarea>
				                 </div>
				        </div>
				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Ide Baru</label>
				            <div class="col-sm-8">
				              <textarea class="form-control" name="ide_baru"></textarea>
				             </div>
				        </div>

				        <div class="form-group row">
				            <label class="col-sm-2 col-form-label">Momen Spesial</label>
				            <div class="col-sm-8">
				                <textarea class="form-control" name="momen_spesial"></textarea>
				             </div>
				        </div> 
				         
				        <button type="submit" class="btn bg-primary" style="color:white;">
				            Submit
				        </button>
				    </form>
 
            </div>
</div>
@endsection