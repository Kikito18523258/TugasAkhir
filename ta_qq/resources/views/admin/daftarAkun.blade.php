@extends('layouts.app')
@section('content')

@php
use Illuminate\Support\Facades\Hash;

@endphp

<div style="margin :3%"> 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Akun</h1>
        <a href="/register" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background: #eb6440; color: white;"><i class="fas fa-book fa-sm text-white-50"></i> Tambah Data </a>      
    </div>

    <div style="margin: 3%;">
        <table class="table" style="width:70%">
                        <thead class="thead-light">
                            <tr>
                                <th width="20%">Nama</th> 
                                <th width="20%">Email</th> 
                                <th width="5%">Tindakan</th> 
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($user as $a)
                            <tr>
                                <td>{{$a->name}}</td>
                                <td>{{$a->email}}</td>
                                <td>
                                <form method="post" action="/daftarAkun/{{$a->id}}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
        </table>
    </div>
</div>
				
@endsection