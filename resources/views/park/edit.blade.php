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
                ctx.lineWidth = 3;
                  ctx.beginPath();
                ctx.rect(parseInt(r[1]), parseInt(r[2]), parseInt(r[3]), parseInt(r[4]));
                ctx.stroke();
              }

              if(r[0]=='font'){

                ctx.lineWidth = 3;
                ctx.font = "30px Arial";
                ctx.beginPath();

                ctx.fillText(r[1],parseInt(r[2]), parseInt(r[3]));
                ctx.stroke();
              }

              if(r[0]=='pen'){

                ctx.lineCap = 'round';

                    ctx.lineWidth = 3;
                    ctx.beginPath();
                    ctx.moveTo(r[1], r[2]);

                    for (var j = 3; j < r.length; j=j+2) {

                        ctx.lineTo(r[j], r[j+1]);

                    }

                    ctx.stroke();
              }

            }

        }


          function myhidden (id) {
            document.getElementById("btn"+id).style.display = "none";
            document.getElementById("draw"+id).style.display = "none";
          }







      </script>

    <body>


      <center><div class="">

        <form method="POST" action="/parkings/{{$parking->id}}/addphoto" enctype="multipart/form-data">
          @csrf
          @method('PUT')


            Location Name:    <input type="text" name="location" value="{{ $parking->location }}">
              <br>
              <br>

                Address  <br>  <textarea name="address" rows="8" cols="80">{{old('address') ?? $parking->address }}</textarea>
            <input  type="hidden" name="list" value="" id='list' >

            <br>
            <br>
            Image Location
            <br>
            <input onchange="readURL(this)" type="file" name="fileToUpload2" id="fileToUpload2" value="">
              <center><img id="imageold" name="photo" style="height:300px;weight:300px;"  src="{{old('photo') ?? $parking->photo }}" > </center>
              <br>



            <!-- <a href="addcarpark" ><button type="button" name="button">ADD</button></a> -->
            <button type="submit" name="button" formaction="/parkings/{{$parking->id}}">submit</button>
            <br>
            <br>
            <br>
            <button type="submit" name="button" onclick="">ADD/DELETE Photolocation</button>
            <br><br>
            </form>

            @foreach($photoslocations as $photoslocation)

                  <center><div class="">

                      <img onload="myFunction({{$photoslocation->id}})" hidden id="scream{{$photoslocation->id}}" width="220" height="277" src="{{ $photoslocation->photo }}" alt="The Scream">
                          <input  type="hidden" name="list" value="{{ $photoslocation->canvas }}" id='list{{$photoslocation->id}}'>
                          <h1>Floor : {{$photoslocation->floor}}</h1>
                    <canvas  id="draw{{$photoslocation->id}}" style="border:1px solid #000000;"></canvas>
                    <br>


                  </div></center>
                  @endforeach


            <br>


      </div></center>

    </body>

@endsection
