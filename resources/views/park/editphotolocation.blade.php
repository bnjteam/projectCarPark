@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#imageold').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}





var canvas, ctx,
  brush = {
      color: '#000000',
      size: 3,
      down: false,
  },
  strokes = [],
  currentStroke = null;

  a=null;

var move=0;
var rect=0;
var pen=0;
var   mx=0;
  var   my=0;
  var textmove=0;
  var target=null;
  var imagepass;





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
      ctx.fillStyle = 'white';
        ctx.beginPath();
      ctx.fillRect(parseInt(r[2])-20, parseInt(r[3])-40,160,60);
      ctx.fillStyle = 'black';
      ctx.strokeStyle='#000000';
      ctx.beginPath();
      ctx.rect(parseInt(r[2])-20, parseInt(r[3])-40,160,60);
        ctx.stroke();
      ctx.font = "30px Arial";
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
  console.log(1212);
}


function myhidden (id) {
  document.getElementById("btn"+id).style.display = "none";
  document.getElementById("draw"+id).style.display = "none";
}

function setclick () {
  document.getElementById("click").value = '1';

}

</script>


  <center><a href="addcarpark"  ><button  class="btn btn-info"   style="padding: 16px 100px;" type="button" name="button">ADD</button></a></center>
  <br>
@foreach($photoslocations as $photoslocation)
<form class="" action="/photoslocations/{{$photoslocation->id}}/" method="post">
   @csrf
   @method('DELETE')

   <input  type="hidden" name="photo_id" value="{{$photoslocation->id}}"  >
   <input  type="hidden" name="park_id" value="{{$parking->id}}"  >

    <center> <div class="card bg-light mb-3" style="max-width: 100rem;">
        <div class="card-header"><h1>Floor : {{$photoslocation->floor}}</h1></div>


          <img onload="myFunction({{$photoslocation->id}})" hidden id="scream{{$photoslocation->id}}" width="220" height="277" src="{{ $photoslocation->photo }}" alt="The Scream">
          <input  type="hidden" name="list" value="{{ $photoslocation->canvas }}" id='list{{$photoslocation->id}}'>

        <canvas  id="draw{{$photoslocation->id}}" style="border:1px solid #000000;"></canvas>
        <br>

        <button type="submit" style="max-width: 70rem;" name="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">DELETE</button>
        <br><br>






      </div></center>
      </form>
      @endforeach

@endsection
