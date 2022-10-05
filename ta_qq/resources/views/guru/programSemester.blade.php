@extends('layouts.app')
@section('content')
				<form method="POST" action="{{ route('register') }}">
                        @csrf

                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Program Semester</h1>
                            
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-800">Kompetensi Dasar Kurikulum SD Negeri 1 Sruweng</h1>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-4 text-gray-800">
                                Kompetensi Inti
                                
                            </div>

                            <div class="col-4 text-gray-800">
                                Kompetensi Dasar
                            </div>
                        </div>


                    </div>

                        
                </form>
@endsection