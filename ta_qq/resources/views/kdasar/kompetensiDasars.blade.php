@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
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
                        <a class="btn btn-info btn-sm" href="/kompetensiDasar/{{$k}}/{{$m}}/{{$kom->id}}/edit">Edit</a> 
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection