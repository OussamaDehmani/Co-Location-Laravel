@extends('layouts.app')

@section('content')
<div class="row">
@foreach($locations as $loc)
  <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
    <a href="{{route('showLoc',[$loc->id])}}"><img class="card-img-top" width="50" height="200" src="data:image;base64,{{$loc->imge}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{$loc->superficie}}</a>
      </h4>
      <h5> {{$loc->price}}$</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    </div>
  </div>
@endforeach
</div>
@endsection
