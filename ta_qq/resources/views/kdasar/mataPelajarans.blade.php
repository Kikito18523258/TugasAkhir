@extends('layouts.app')
@section('content')
<div style="margin: 3%;">
    <div class="card-deck">
        @foreach($showMateri as $sm)
          <div class="card">
            <img class="card-img-top" src="{{ URL::to('/') }}/img/Kelas{{$k}}/{{$sm->nama}}.png" style="height: 200px">
            <div class="card-body">
              <h5 class="card-title">{{$sm->nama}}</h5>
              <p class="card-text"> {{$sm->keterangan}}</p>
              <p class="card-text"><small class="text-muted">Kelas {{$k}}</small></p>
              <a href="/kompetensiDasar/{{$k}}/{{$sm->id}}/" class="btn btn-primary">Buka</a>
            </div>
          </div>
          @endforeach
    </div>
</div>
@endsection