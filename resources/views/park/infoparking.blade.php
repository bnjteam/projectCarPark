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
      <img class="card-img-top" src="{{ $parking->photo }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">My Reserve </h5>
        @if (isset($parking))
              <p class="card-text">Location : {{ $parking->location}}</p>
        @else

            <p class="card-text">Location : - </p>
        @endif
      </div>
      <ul class="list-group list-group-flush">
        @if (isset($parking))
          <li class="list-group-item">Address : {{ $parking->address }}</li>
          <li class="list-group-item">TimeOut reserve At : {{ $timeOut }}</li>
          Show this qrcode when you arrive the location<br>
               <a href="/qr-code">This is your QR-code</a>
        @else
          <li class="list-group-item">Address : -</li>
          <li class="list-group-item">TimeOut reserve At : -</li>
        @endif
      </ul>
      <div class="card-body">

        <a href="#" role="button" class="card-link btn btn-success">Unreserve</a>
      </div>
    </div>
    <center>
  </body>
</html>
@endsection
