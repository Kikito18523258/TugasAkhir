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
                            <th width="15%">Status</th>
                            <th width="25%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rpp as $rppList)
                        <tr>
                            <td>{{$loop->iteration}}</td> 
                            <td>
                                @foreach($tema as $t)
                                @if($rppList->tema== $t->id)
                                    {{$t->judul_tema}}
                                @endif
                                @endforeach
                            </td>

                            <td>
                                @foreach($subtema as $st)
                                @if($rppList->sub_tema== $st->id)
                                    {{$st->judul}}
                                @endif
                                @endforeach
                            </td>

                            <td>{{$rppList->pembelajaran_ke}}</td>

                            <td>
                                @foreach($evaluasi as $e)
                                @if($e->id_rpp==$rppList->id_rpp)  
                                    @if($e->status==1)
                                        Terlaksana
                                    @elseif($e->status==0)
                                        Tidak Terlaksana
                                    @endif
                                @endif
                                @endforeach
                            </td>


                            <td>
                                <form method="post" action="{{ route('rpp.destroy',$rppList->id_rpp)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-secondary btn-sm" href="/evaluasi/{{$rppList->id_rpp}}/viewEvaluasi"><i class="fas fa-fw fa-eye"></i></a> 
                                    <a class="btn btn-info btn-sm" href="/evaluasi/{{$rppList->id_rpp}}"><i class="fas fa-fw fa-pen"></i></a> 
                                    <!-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></button> -->
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
 
            </div>
</div>
@endsection