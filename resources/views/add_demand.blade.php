@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ route('addD') }}" method="POST" enctype="multipart/form-data">
  @CSRF
 
    <div class="form-group">
      <label for="phone">phone</label>
      <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter phone">
    </div>
    <div class="form-group">
      <label for="capacity">Ville</label>
      <input type="text" class="form-control" name="ville" aria-describedby="emailHelp" placeholder="Enter Ville">
    </div>
    <div class="form-group">
      <label for="latitude">commentaire</label>
      <input type="text" class="form-control" name="commentaire" aria-describedby="emailHelp" placeholder="Enter commentaire">
    </div>
  
    <div class="form-group">
      <label for="price">budget</label>
      <input type="text" class="form-control" name="budget" aria-describedby="emailHelp" placeholder="Enter budget">
    </div>


    <div class="form-check">
  <button type="submit" class="btn btn-success lg">Submit</button>
  </form>
</div>

@endsection
