@extends('layouts.app')

@section('content')
<div class="container row">

  <div class="col-md-3">

  </div>
  <div class=" col-md-6">

       <a><img class="card-img-top" width="50" height="200" src="{{asset('demandloc.jpg')}}" alt=""></a>

  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><span style='color:#2e64c1'>nom :</span> {{$user->name}}</li>
      </ol>
    </nav>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><span style='color:#2e64c1'>Phone :</span> {{$dem->phone}} </li>
    </ol>
  </nav>


  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page" id='long'><span style='color:#2e64c1'>ville :</span> {{$dem->ville}}</li>
    </ol>
  </nav>

  <nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"  aria-current="page"><span style='color:#2e64c1'>commentaire :</span> {{$dem->commentaire}}</li>
    </ol>
  </nav>


</div>
@endsection
