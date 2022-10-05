@extends('layouts.app')
@section('content')
				<form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Mata Pelajaran') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="namaPelajaran">
                                    <option>Matematika</option>
                                    <option>Bahasa Indonesia</option>
                                    <option>Ilmu Pengetahuan Alam</option>
                                    <option>Ilmu Pengetahuan Sosial</option>
                                    <option>Pendidikan Kewarganegaraan</option>
                                    <option>Pendiidkan Agama Islam dan Budi Pekerti</option>
                                    <option>Pendidikan Jasmasi, Olahraga dan Kesehatan</option>
                                </select> 
                            </div>
                        </div>
                        
                    </form>
@endsection