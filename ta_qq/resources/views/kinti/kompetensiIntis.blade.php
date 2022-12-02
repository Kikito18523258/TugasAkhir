@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"> Kelas {{$k}}</h1>  
                <a href="/kompetensiInti/{{$k}}/create" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background: #eb6440;color: white;"><i class="fas fa-book fa-sm text-white-50"></i> Tambah Data</a>         
            </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th width="80%">Judul Kompetensi</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($showKompetensiInti as $komIn)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$komIn->judul}}</td>
                <td>
                    <form method="post" action="/kompetensiInti/{{$k}}/{{$komIn->id}}/delete">
                        @csrf
                        @method('DELETE')
                        <!-- <a class="btn btn-info btn-sm" href=""><i class="fas fa-fw fa-pen"></i></a>  -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection