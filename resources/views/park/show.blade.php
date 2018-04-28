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

              listid=[];

          function myFunction (id) {
            // console.log('id: '+id);
            listid.push(id);

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


                  currentStroke.points.push({
                      x: parseInt(r[2]),
                      y: parseInt(r[3]),
                      text:r[1],
                      canvas_id:id,
                  });


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


               strokes[id+'']=currentStroke;


              var canvas = document.getElementById('draw'+id);
              var context = canvas.getContext('2d');

              canvas.addEventListener('mousemove', function(evt) {
                var mousePos = getMousePos(canvas, evt);
                var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;

                for (var i = 0; i < strokes[id+''].points.length; i++) {
                    //
                    // console.log('endX: '+strokes[id+''].points[i].x);
                    // console.log('endY: '+strokes[id+''].points[i].y);

                  if (strokes[id+''].points[i].x-20 < mousePos.x &&  mousePos.x < strokes[id+''].points[i].x+140
                &&  mousePos.y > strokes[id+''].points[i].y-40 &&  mousePos.y < strokes[id+''].points[i].y+20){

                    // console.log(strokes[id+''].points[i].canvas_id);
                     canvasin = document.getElementById('draw'+strokes[id+''].points[i].canvas_id);
                     contextin = canvasin.getContext('2d');

                     contextin.lineWidth = 3;
                     contextin.font = "30px Arial";
                     contextin.fillStyle = 'yellow';
                     contextin.beginPath();
                     contextin.fillRect(strokes[id+''].points[i].x-20, strokes[id+''].points[i].y-40,160,60);
                     contextin.fillStyle = 'black';
                     contextin.strokeStyle='#000000';
                     contextin.beginPath();
                     contextin.rect(strokes[id+''].points[i].x-20, strokes[id+''].points[i].y-40,160,60);
                     contextin.fillText(strokes[id+''].points[i].text,strokes[id+''].points[i].x, strokes[id+''].points[i].y);

                       contextin.stroke();

                  }else{
                    // console.log(strokes[id+''].points[i].canvas_id);
                     canvasin = document.getElementById('draw'+strokes[id+''].points[i].canvas_id);
                     contextin = canvasin.getContext('2d');

                     contextin.lineWidth = 3;
                     contextin.font = "30px Arial";
                     contextin.fillStyle = 'white';
                     contextin.beginPath();
                     contextin.fillRect(strokes[id+''].points[i].x-20, strokes[id+''].points[i].y-40,160,60);
                     contextin.fillStyle = 'black';
                        contextin.strokeStyle='#000000';
                     contextin.beginPath();
                     contextin.rect(strokes[id+''].points[i].x-20, strokes[id+''].points[i].y-40,160,60);
                     contextin.fillText(strokes[id+''].points[i].text,strokes[id+''].points[i].x, strokes[id+''].points[i].y);

                       contextin.stroke();
                  }
                }
              }, false);

              canvas.addEventListener('mousedown', function(evt) {

                  var mousePos = getMousePos(canvas, evt);
                var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;

                for (var i = 0; i < strokes[id+''].points.length; i++) {
                    //
                    // console.log('endX: '+strokes[id+''].points[i].x);
                    // console.log('endY: '+strokes[id+''].points[i].y);


                  if (strokes[id+''].points[i].x-20 < mousePos.x &&  mousePos.x < strokes[id+''].points[i].x+140
                &&  mousePos.y > strokes[id+''].points[i].y-40 &&  mousePos.y < strokes[id+''].points[i].y+20){
                    // console.log(111121212112);
                    // addselect(strokes[id+''].points[i].text);

                     modal = document.getElementById('exampleModal'+id);

                     tag=strokes[id+''].points[i].text.substr(strokes[id+''].points[i].text.length-1);
                     filterselect(modal,tag,id,strokes[id+''].points[i].text);
                     modal.style.display = "block";
                       console.log('clickkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk');

                  }
                }


              }, false);





          }
          function closemodal(){
            for ( i = 0; i < listid.length; i++) {
              modal = document.getElementById('exampleModal'+listid[i]);
              modal.style.display = "none";

            }
          }
          window.onclick = function(event) {
            for ( i = 0; i < listid.length; i++) {
              modal = document.getElementById('exampleModal'+listid[i]);
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
            }
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


    function  filterselect(modal,str,id,text) {
      // console.log(modal);
      // console.log(str);
      // console.log(id);
      // console.log(text);
      test = document.getElementById("test"+id);
       lentest = test.options.length;
      for (i = 0; i < lentest; i++) {
        test.options[0] = null;
      }
      artext= text.split(" ");

      for (var j = parseInt(artext[0]); j <= parseInt(artext[2]); j++) {
        cstr=j+tag;
        // console.log("cs: "+cstr);
        option = document.createElement("option");
        option.text = cstr;
        option.value=cstr;
        test.add(option);
      }
      console.log(test.options[test.selectedIndex].value);
       document.getElementById('selectmap').value=test.options[test.selectedIndex].value;
       document.getElementById('selectmap2').value=id;
      // select = document.getElementById("select"+id);
      // var length = select.options.length;
      // for (i = 0; i < length; i++) {
      //   tag=select.options[i].value.substr(select.options[i].value.length-1);
      //   console.log('tag: '+tag);
      //   if(tag==str){
      //
      //       artext= text.split(" ");
      //
      //       // for (var j = parseInt(artext[0]); j <= parseInt(artext[2]); j++) {
      //       //   cstr=j+tag;
      //       //   console.log("cs: "+cstr);
      //       // }
      //     option = document.createElement("option");
      //     option.text = select.options[i].value;
      //     option.value=select.options[i].value;
      //     test.add(option);
      //   }
      // }
    }
    function setselectmap(id){
      test = document.getElementById("test"+id);
      document.getElementById('selectmap').value=test.options[test.selectedIndex].value;
        document.getElementById('selectmap2').value=id;
    }

        </script>
    <body>

      <center><h1>  {{$parking->location}}</h1></center>

      <center><label>Address</label> <br>
      <div class="paper">
         <div class="paper-content">
      <textarea disabled  name="address" rows="8" cols="80">{{$parking->address}}</textarea>
      </div>
    </div></center>


      <form method="POST" action="/parkings/updatemap" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input hidden type="text" id='selectmap' name="selectmap" value="">
        <input hidden type="text" id='selectmap2' name="selectmap2" value="">
      @foreach($photoslocations as $photoslocation)
            <br>
            <center><div class="">

                <img onload="myFunction({{$photoslocation->id}})" hidden id="scream{{$photoslocation->id}}" width="220" height="277" src="{{ $photoslocation->photo }}" alt="The Scream">
                    <input  type="hidden" name="list" value="{{ $photoslocation->canvas }}" id='list{{$photoslocation->id}}'>
                    <h1>Floor: {{$photoslocation->floor}}</h1>
              <canvas  id="draw{{$photoslocation->id}}" style="border:1px solid #000000;"></canvas>



              <br>

              <!-- <button type="submit" name="button" >button</button> -->


            </div></center>


            <div class="modal" id="exampleModal{{$photoslocation->id}}">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Reserve</h5>
                <!-- <button type="button" onclick="closemodal()" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
              </div>
              <div class="modal-body">


              <center>  <select  hidden class="" name="" id='select{{$photoslocation->id}}'>
                  @foreach($maps as $map)

                  @if($photoslocation->id == $map->id_photo)

                      @if($map->status == 'empty')
                    <option value="{{$map->number}}">{{$map->number}}</option>
                      @endif
                  @endif

                  @endforeach
                </select></center>

              <center>  <select class="" name="" id='test{{$photoslocation->id}}' onchange="setselectmap({{$photoslocation->id}})">

                </select></center>


              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">reserve</button>
                <button type="button" onclick="closemodal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            @endforeach

  </form>
    </body>

@endsection
