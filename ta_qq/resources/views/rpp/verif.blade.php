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
                  
            </div>
            <div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th width="8%">No</th>
                            <th width="30%">Tema</th>
                            <th width="25%">Subtema</th> 
                            <th width="15%">Pembelajaran ke</th> 
                            <th width="10%">Status</th>  
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
                                @if($rppList->verifikasi==0)
                                <form method="post" action="/verifRpp/{{$rppList->id_rpp}}">
                                    @csrf
                                    @method('POST') 
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Verifikasi</button>
                                </form>
                                @elseif($rppList->verifikasi==1)
                                <b style="color:green">Terverifikasi</b>
                                @endif
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
 
            </div>
</div>
@endsection