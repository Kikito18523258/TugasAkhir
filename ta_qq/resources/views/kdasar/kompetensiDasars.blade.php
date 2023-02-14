@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$namaMapel->keterangan }} / Kelas {{$k}}</h1>  
                <a href="/kompetensiDasar/{{$k}}/{{$m}}/create" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background: #eb6440;color: white;"><i class="fas fa-book fa-sm text-white-50"></i> Tambah Data</a>         
            </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th width="10%">Kode KD</th>
                <th width="30%">Kompetensi</th>
                <th width="35%">Indikator</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($showKompetensi as $kom)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kom->kodeKD}}</td>
                <td>{{$kom->kompetensiDasar}}</td>
                <td>
                     {!! nl2br(e($kom->indikator))!!}
                </td>
                <td>
                    <form method="post" action="{{ route('kompetensiDasar.destroy',$kom->id)}}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info btn-sm" href="/kompetensiDasar/{{$k}}/{{$m}}/{{$kom->id}}/edit"><i class="fas fa-fw fa-pen"></i></a> 
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection