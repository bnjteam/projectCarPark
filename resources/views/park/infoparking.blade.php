@extends('layouts.app')
@section('head')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>parking reserve info</title>






  </head>
  <body><br><br><br><br><br>
    <center>
    <div class="card" style="width: 40rem;">
      <img class="card-img-top" src="{{ Auth::user()->avatar }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">My Parking Reserve</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div class="card-body">
        <a href="#" role="button" class="card-link btn btn-success">Unreserve</a>
        <a href="#" role="button" class="card-link btn btn-danger">Another link</a>
      </div>
    </div>
    <center>
  </body>
</html>
@endsection
