@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">RPP</h1>
                <a href="/rpp/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-book fa-sm text-white-50"></i>Tambah Data</a>      
            </div>
            <div>
                <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th width="50%">Tema</th>
                <th width="30%">Subtema</th> 
                <th width="20%">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rpp as $rppList)
            <tr>
                <td>{{$loop->iteration}}</td> 
                <td>{{$rppList->tema}}</td>
                <td>{{$rppList->sub_tema}}</td>
                <td>
                    <form method="post" action="{{ route('rpp.destroy',$rppList->id_rpp)}}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info btn-sm" href="rpp/{{$rppList->id_rpp}}/edit">Edit</a> 
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            </div>
</div>
@endsection