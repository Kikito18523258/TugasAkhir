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
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th width="8%">No</th>
                            <th width="25%">Tema</th>
                            <th width="25%">Subtema</th> 
                            <th width="15%">Pembelajaran ke</th> 
                            <th width="10%">Evaluasi</th> 
                            <th width="25%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rpp as $rppList)
                        <tr>
                            <td>{{$loop->iteration}}</td> 
                            <td>{{$rppList->tema}}</td>
                            <td>{{$rppList->sub_tema}}</td>
                            <td>{{$rppList->pembelajaran_ke}}</td>
                            <td><a href="/evaluasi/eval/{{$rppList->id_rpp}}" class="btn btn-light btn-sm"><i class="fas fa-fw fa-edit"></i></a></td>
                            <td>
                                <form method="post" action="{{ route('rpp.destroy',$rppList->id_rpp)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-secondary btn-sm" href="rpp/{{$rppList->id_rpp}}/edit"><i class="fas fa-fw fa-eye"></i></a> 
                                    <a class="btn btn-info btn-sm" href="rpp/{{$rppList->id_rpp}}/edit"><i class="fas fa-fw fa-pen"></i></a> 
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