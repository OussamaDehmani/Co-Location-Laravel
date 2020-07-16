@extends('layouts.app')

@section('content')
<div class="row">


@foreach($Demands as $loc)
  <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
    <a href="{{route('showDem',[$loc->id])}}"><img class="card-img-top" width="50" height="200" src="{{ asset('demandloc.jpg') }}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{$loc->phone}}</a>
        <a href="#">{{$loc->ville}}</a>
      </h4>
      <h5> {{$loc->budget}}$</h5>
      <p class="card-text">{{$loc->commentaire}}</p>
    </div>
    </div>
  </div>
@endforeach
</div>
@endsection
