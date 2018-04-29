@extends('layouts.app')
@section('head')


  <script type="text/javascript">
  function myFunction (id) {
      canvas = $('#draw'+id);
      canvas.attr({
          width: 1100 ,
          height: 600,
          // width: window.innerWidth,
          // height: window.innerHeight,
      });
      ctx = canvas[0].getContext('2d');


      ctx.drawImage(document.getElementById("scream"+id), 0, 0,1100,600);

      var str = document.getElementById("list"+id).value;
      var res = str.split("|");
      for (var i = 0; i < res.length; i++) {

        var r = res[i].split(",");
        if(r[0]=='rect'){
          ctx.strokeStyle = r[5];
          ctx.lineWidth = r[6];
            ctx.beginPath();
          ctx.rect(parseInt(r[1]), parseInt(r[2]), parseInt(r[3]), parseInt(r[4]));
          ctx.stroke();
        }

        if(r[0]=='font'){

          ctx.lineWidth = 3;
          ctx.font = "30px Arial";
          ctx.fillStyle = 'white';
          ctx.beginPath();
          ctx.fillRect(parseInt(r[2])-20, parseInt(r[3])-40,160,60);
          ctx.fillStyle = 'black';
          ctx.strokeStyle='#000000';
          ctx.beginPath();
          ctx.rect(parseInt(r[2])-20, parseInt(r[3])-40,160,60);
            ctx.stroke();
          ctx.fillText(r[1],parseInt(r[2]), parseInt(r[3]));
          ctx.stroke();
        }

        if(r[0]=='pen'){

          ctx.lineCap = 'round';
          ctx.strokeStyle = r[r.length-2];
          ctx.lineWidth = r[r.length-1];
              ctx.beginPath();
              ctx.moveTo(r[1], r[2]);

              for (var j = 3; j < r.length; j=j+2) {

                  ctx.lineTo(r[j], r[j+1]);

              }

              ctx.stroke();
        }

      }

  }
  </script>
  <body><br><br><br><br><br>
    <center>
    <div class="card" style="width: 40rem;">



        <li class="list-group-item">    <h1 class="card-title">My Reserve </h1></li>
      <div class="card-body">

        <p class="card-text">Location : {{ $parking->location}}</p>
                <img class="card-img-top" src="{{ $parking->photo}}" >
                <br>

                <p>Address</p>
                <textarea disabled name="name" rows="8" cols="65"> {{ $parking->address }}</textarea>

      </div>
      <li class="list-group-item">

        <p class="card-text">Floor : {{$photolocation->floor}}</p>
            <img onload="myFunction({{$photolocation->id}})" hidden id="scream{{$photolocation->id}}" width="220" height="277" src="{{ $photolocation->photo }}" alt="The Scream">
        <canvas  id="draw{{$photolocation->id}}" style="border:1px solid #000000;"></canvas>

           </li>


           <li class="list-group-item">
              <p>reserve: {{$map->number}}</p>
                    <p class="card-text">TimeOut reserve At : {{ $timeOut }}</p>

                       Show this qrcode when you arrive the location<br>
                            <a href="/qr-code">This is your QR-code</a>
                </li>


      <div class="card-body">

        <a href="#" role="button" class="card-link btn btn-success">Unreserve</a>
      </div>
    </div>
  </center>

@endsection
