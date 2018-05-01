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
      select = document.getElementById("select"+id);
      len=select.length;
      for (var j = parseInt(artext[0]); j <= parseInt(artext[2]); j++) {
        cstr=j+tag;
            // console.log("cs: "+cstr);
        che=0;
        for (var k = 0; k < len; k++) {
          console.log(select.options[k].value);
          if (select.options[k].value==cstr) {
            che=1;
          }
        }
        if(che==0){
          option = document.createElement("option");
          option.text = cstr;
          option.value=cstr;
          test.add(option);
        }
      }
      console.log(test.options[test.selectedIndex].value);
       document.getElementById('selectmap').value=test.options[test.selectedIndex].value;
       document.getElementById('selectmap2').value=id;

    }

    function setselectmap(id){
      test = document.getElementById("test"+id);
      document.getElementById('selectmap').value=test.options[test.selectedIndex].value;
        document.getElementById('selectmap2').value=id;
    }

        </script>

        <br>
        <br><br>
    <body>
      <div align="center">
      <div class="card"   style="width: 1400px; background-color:rgba(0, 0, 0, 0.5); color:white;">
      <div class="card-header">  <h1>  {{$parking->location}}</h1></div>

      <div class="card-body" >
        <center>


      <img src="{{ $parking->photo}}" width=1100px alt=""><br>
      <label>Address</label> <br>
      <div class="paper">
         <div class="paper-content">
      <textarea disabled  name="address" rows="3" cols="80">{{$parking->address}}</textarea>
      </div>
    </div>


  </center>


      <form method="POST" action="/parkings/updatemap" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input  hidden type="text" id='selectmap' name="selectmap" value="">
        <input  hidden type="text" id='selectmap2' name="selectmap2" value="">
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
                      @foreach($current_maps as $current_map)
                            @if($current_map->id_map == $map->id)
                            <option value="{{$map->number}}">{{$map->number}}</option>
                            @endif
                        @endforeach
                  @endif
                  @endforeach
                </select></center>

              <center>  <select class="" name="" id='test{{$photoslocation->id}}' onchange="setselectmap({{$photoslocation->id}})">

                </select></center>

              </div>
              <div class="modal-footer">
                @if (Auth::check())

                  @if ( Auth::user()->level=='member' )
                      @if ($current_maps->where('id_user','like',Auth::user()->id)->first()==null)
                          <button type="submit" class="btn btn-primary">reserve</button>


                      @endif


                  @endif
                  @if (Auth::user()->level=='guest' )

                    <button type="submit" class="btn btn-primary">reserve</button>
                  @endif

                @endif
                <button type="button" onclick="closemodal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            @endforeach

  </form>
</body>
</div>
</div>
</div>
</div>

</div>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto);
    @import url(https://fonts.googleapis.com/css?family=Handlee);

    body {
        margin: 0 0 0;
        /* background: #FFFFCC; */
        font-family: 'Roboto', sans-serif;
    }

    .paper {
        position: relative;
        width: 90%;
        max-width: 800px;
        min-width: 400px;
        height: 390px;
        margin: 0 auto;
        background: #fafafa;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,.3);
        overflow: hidden;
    }
    .paper:before {
        content: '';
        position: absolute;
        top: 0; bottom: 0; left: 0;
        width: 60px;
        background: radial-gradient(#575450 6px, transparent 7px) repeat-y;
        background-size: 30px 30px;
        border-right: 3px solid #D44147;
        box-sizing: border-box;
    }

    .paper-content {
        position: absolute;
        top: 30px; right: 0; bottom: 30px; left: 60px;
        background: linear-gradient(transparent, transparent 28px, #91D1D3 28px);
        background-size: 30px 30px;
    }

    .paper-content textarea {
        width: 100%;
        max-width: 100%;
        height: 100%;
        max-height: 100%;
        line-height: 30px;
        padding: 0 10px;
        border: 0;
        outline: 0;
        background: transparent;
        color: mediumblue;
        font-family: 'Handlee', cursive;
        font-weight: bold;
        font-size: 18px;
        box-sizing: border-box;
        z-index: 1;


    }
    </style>
@endsection
