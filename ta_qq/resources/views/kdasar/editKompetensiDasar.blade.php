@extends('layouts.app')
@section('content')
				<div class="w-50 p-2">
                    <form method="POST" action="{{ route('kompetensiDasar.update',$findID->id) }}">
                    @csrf  
                    @method('PUT') 
                    <div class="container-fluid">
                        <input type="hidden" value="{{$findID->mataPelajaran}}" name="mapel">
                        <input type="hidden" value="{{$findID->kelas}}" name="kelas"> 
                        <div class="form-group">
                                <label for="fname">Kode Kompetensi Dasar:</label>
                                <input type="text" class="form-control" value="{{$findID->kodeKD}}"  name="kodeKD" >
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">
                                    Please fill this field
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lname">Kompetensi:</label>
                                <input type="text" class="form-control" value="{{$findID->kompetensiDasar}}" name="kompetensiDasar" >
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">
                                    Please fill this field
                                </div>
                            </div>
                            <div class="form-group" style="width: 80%">
                                <label for="lname">Indikator:</label>
                                <textarea class="form-control" name="indikator">{{$findID->indikator}}
                                </textarea>
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">
                                    Please fill this field
                                </div>
                            </div> 
                            <button type="submit" class="btn bg-primary" style="color:white">
                                Submit
                            </button>
                    </div>

                        
                </form>
                </div>
@endsection