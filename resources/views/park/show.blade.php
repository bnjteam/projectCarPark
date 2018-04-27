@extends('layouts.app')
@section('content')
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

          <script>

          var canvas, ctx,
              brush = {
                  color: '#000000',
                  size: 3,
                  down: false,
              },

              strokes = {

              };




          function myFunction (id) {
            // console.log('id: '+id);


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

              currentStroke=null;
              currentStroke = {
                  points: [],
              };
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
                    ctx.rect(parseInt(r[2]), parseInt(r[3]),120,-40);
                    ctx.stroke();


                  currentStroke.points.push({
                      x: parseInt(r[2]),
                      y: parseInt(r[3]),
                      text:r[1],
                  });


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


               strokes[id+'']=currentStroke;


              var canvas = document.getElementById('draw'+id);
              var context = canvas.getContext('2d');

              // canvas.addEventListener('mousemove', function(evt) {
              //   var mousePos = getMousePos(canvas, evt);
              //   var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;
              //   console.log();
              //   // writeMessage(canvas, message);
              // }, false);

              canvas.addEventListener('mousedown', function(evt) {

                  var mousePos = getMousePos(canvas, evt);
                var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;

                for (var i = 0; i < strokes[id+''].points.length; i++) {
                    //
                    // console.log('endX: '+strokes[id+''].points[i].x);
                    // console.log('endY: '+strokes[id+''].points[i].y);

                  if (strokes[id+''].points[i].x < mousePos.x &&  mousePos.x < strokes[id+''].points[i].x+120
                &&  mousePos.y > strokes[id+''].points[i].y-40 &&  mousePos.y < strokes[id+''].points[i].y){
                    // console.log(111121212112);
                    addselect(strokes[id+''].points[i].text);
                     modal = document.getElementById('exampleModal');
                     modal.style.display = "block";
                       console.log('clickkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk');

                  }
                }


              }, false);

          }



      function writeMessage(canvas, message) {
        var context = canvas.getContext('2d');
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.font = '18pt Calibri';
        context.fillStyle = 'black';
        context.fillText(message, 10, 25);
      }
      function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
          x: evt.clientX - rect.left,
          y: evt.clientY - rect.top
        };
      }
      // When the user clicks on <span> (x), close the modal

    function closemodal(){
      modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  modal = document.getElementById('exampleModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    function addselect(str) {
    select = document.getElementById("select");
    var length = select.options.length;
    for (i = 0; i < length; i++) {
      select.options[0] = null;
    }

      console.log('text: '+str);
       str2 = str.split(" ");
       tag=str2[0].substr(1, 1);
       x = document.getElementById("select");

       for ( z = parseInt(str2[0]); z <= parseInt(str2[2]); z++) {
            option = document.createElement("option");
            option.text = z+tag;
            x.add(option);
       }



    }

        </script>
    <body>

      <center><h1>  {{$parking->location}}</h1></center>
      <center><p>address: {{$parking->address}}</p></center>

      @csrf

      @foreach($photoslocations as $photoslocation)

            <center><div class="">

              <form method="POST" action="/parkings" enctype="multipart/form-data">

                <img onload="myFunction({{$photoslocation->id}})" hidden id="scream{{$photoslocation->id}}" width="220" height="277" src="{{ $photoslocation->photo }}" alt="The Scream">
                    <input  type="hidden" name="list" value="{{ $photoslocation->canvas }}" id='list{{$photoslocation->id}}'>

              <canvas  id="draw{{$photoslocation->id}}" style="border:1px solid #000000;"></canvas>



              <br>

              <!-- <button type="submit" name="button" >button</button> -->
            </form>

            </div></center>
            @endforeach

            <div class="modal" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Reserve</h5>
                <button type="button" onclick="closemodal()" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <center><select class="" name="" id='select'>

                </select></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">reserve</button>
                <button type="button" onclick="closemodal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </body>

@endsection
