@extends('layouts.app')
@section('content')

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

          <script>

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


            function reDraw(){
              ctx.clearRect(0, 0, canvas.width(), canvas.height());
              for (var i = 0; i < strokes.length; i++) {
                  var s = strokes[i];
                  if(s!=null){
                    if(s.type==0){
                      drawPen(s);
                    }else if(s.type==1){
                      drawRect(s);
                    }else if(s.type==2){
                      drawPic(s);
                    }else if(s.type==3){
                      drawFont(s);
                    }
                  }
              }

            }

            function drawPic (s) {

                    ctx.drawImage(s.img, 0, 0,1100,600);
            }


          function drawRect (s) {

                    ctx.strokeStyle = s.color;
                    ctx.lineWidth = s.size;
                    ctx.beginPath();

                    var p = s.points[0];
                    var p2 = s.points[1];
                    ctx.rect(p.x, p.y, p2.x-p.x, p2.y-p.y);
                    ctx.stroke();



          }
          function drawPen (s) {

              ctx.lineCap = 'round';
                  ctx.strokeStyle = s.color;
                  ctx.lineWidth = s.size;
                  ctx.beginPath();
                  ctx.moveTo(s.points[0].x, s.points[0].y);
                  for (var j = 0; j < s.points.length; j++) {
                      var p = s.points[j];
                      ctx.lineTo(p.x, p.y);
                  }
                  ctx.stroke();

          }

          function drawFont(s){
            ctx.fillStyle = s.color;
            ctx.lineWidth = 3;
            ctx.font = "30px Arial";
            ctx.beginPath();


              ctx.fillText(s.text,s.x,s.y);


              if (target==s){
                ctx.strokeStyle='#000000';
                ctx.beginPath();
                ctx.rect(s.x-20, s.y-40,s.w, s.h);
                ctx.stroke();
              }

          }



          function init () {
              canvas = $('#draw');
              canvas.attr({
                  width: 1100 ,
                  height: 600,
                  // width: window.innerWidth,
                  // height: window.innerHeight,
              });
              ctx = canvas[0].getContext('2d');


              function mouseEvent (e) {
                var canvas2 = document.getElementById('draw');
                x2=e.pageX-canvas2.getBoundingClientRect().left;
               y2=e.pageY-canvas2.getBoundingClientRect().top;
                if(pen==1){

                  brush.x = x2;
                  brush.y = y2;
                  if (currentStroke!=null){
                    currentStroke.points.push({
                        x: brush.x,
                        y: brush.y,
                    });

                    reDraw();
                  }

                }

              }

              canvas.mousedown(function (e) {
                var canvas2 = document.getElementById('draw');
                x2=e.pageX-canvas2.getBoundingClientRect().left;
               y2=e.pageY-canvas2.getBoundingClientRect().top;

                if (move==1){
                for (var i = 0; i < strokes.length; i++) {
                  if(strokes[i].type==3){
                    if(strokes[i].x-20 <= x2 && x2<=strokes[i].x+180  && strokes[i].y-40<=y2 && y2<=strokes[i].y+20){
                      textmove=1;
                      if(target==null){
                          target=strokes[i];
                      }
                        break;
                    }
                  }else if (strokes[i].type==1){
                    if (strokes[i].points[0].x>strokes[i].points[1].x){
                      minx=strokes[i].points[1].x;
                      maxx=strokes[i].points[0].x;
                    }else{
                      minx=strokes[i].points[0].x;
                      maxx=strokes[i].points[1].x;;
                    }
                    if (strokes[i].points[0].y>strokes[i].points[1].y){
                      miny=strokes[i].points[1].y;
                      maxy=strokes[i].points[0].y;
                    }else{
                      miny=strokes[i].points[0].y;
                      maxy=strokes[i].points[1].y;
                    }

                    if(minx <= x && x<=maxx && miny <= y && y<=maxy){
                      textmove=2;
                      if(target==null){
                          target=strokes[i];
                      }
                        break;
                    }
                  }
                }
              }

                console.log('down');
                  brush.down = true;
                  if (rect==1 ){
                    if (currentStroke==null){
                      currentStroke = {
                          type:1,
                          color: brush.color,
                          size: brush.size,
                          points: [],
                      };
                      currentStroke.points.push({
                          x: x2,
                          y: y2,
                      });
                    }
                  }
                  if(pen==1){
                    currentStroke = {
                        type:0,
                        color: brush.color,
                        size: brush.size,
                        points: [],
                    };
                    strokes.push(currentStroke);

                    mouseEvent(e);
                  }
                  reDraw();

              }).mouseup(function (e) {
                var canvas2 = document.getElementById('draw');
                x2=e.pageX-canvas2.getBoundingClientRect().left;
               y2=e.pageY-canvas2.getBoundingClientRect().top;

                textmove=0;
                target=null;
                  brush.down = false;

                  if (rect==1){
                    if (currentStroke!=null){
                      currentStroke.points.push({
                          x: x2,
                          y: y2,
                      });
                    }
                    strokes.push(currentStroke);

                  }
                  currentStroke = null;
                  reDraw();
              }).mousemove(function (e) {
                 var canvas2 = document.getElementById('draw');

                // console.log(e.pageX-canvas2.getBoundingClientRect().left);
                // console.log(e.pageY-canvas2.getBoundingClientRect().top);
                x=e.pageX-canvas2.getBoundingClientRect().left;
                y=e.pageY-canvas2.getBoundingClientRect().top;

                  direct=0;
                  if(target!=null && textmove==1){
                    target.x=x-60;
                    target.y=y+20;
                      reDraw();
                  }else if(textmove==2 && target!=null){
                    wid=Math.abs( target.points[1].x-target.points[0].x);

                    hig=Math.abs( target.points[1].y-target.points[0].y);


                    target.points[0].x=x-wid/2;
                    target.points[1].x=target.points[0].x+wid;
                    target.points[0].y=y-hig/2;
                    target.points[1].y=target.points[0].y+hig;
                    reDraw();
                  }

                  if (x > mx){
                      direct=1;
                  } else if( x < mx){
                      direct=2;
                  }else if( y > my){
                      direct=3;
                  }else if( y < my){
                      direct=4;
                  }



              mx=x;
              my=y;

                if (rect==1){
                  if (brush.down){
                    reDraw();
                    ctx.strokeStyle = currentStroke.color;
                    ctx.lineWidth = currentStroke.size;
                      ctx.beginPath();
                      ctx.rect(currentStroke.points[0].x, currentStroke.points[0].y, x-currentStroke.points[0].x, y-currentStroke.points[0].y);
                      ctx.stroke();
                  }
                }
                if(pen==1){
                    mouseEvent(e);
                }

              });

              $('#save-btn').click(function () {

                // var link = document.createElement('a');
                // link.download = "test.png";
                // link.href = document.getElementById("draw").toDataURL("image/png").replace("image/png", "image/octet-stream");;
                // link.click();
                //
                //   // window.open(canvas[0].toDataURL());
                //   console.log(1111);

                var canvas2 = document.getElementById('draw');
                var dataURL = canvas2.toDataURL();
                console.log(123);

              });

              $('#undo-btn').click(function () {
                  strokes.pop();
                    reDraw();
              });

              $('#clear-btn').click(function () {
                  strokes = [];
                  reDraw();
              });

              $('#color-picker').on('input', function () {
                  brush.color = this.value;
              });

              $('#brush-size').on('input', function () {
                  brush.size = this.value;
              });

              $('#rect-btn').click(function () {
                document.getElementById("move-btn").disabled = false;
                document.getElementById("pen-btn").disabled = false;
                document.getElementById("rect-btn").disabled = true;
                  rect=1;
                    pen=0;
                    move=0;

              });

              $('#pen-btn').click(function () {
                document.getElementById("move-btn").disabled = false;
                document.getElementById("pen-btn").disabled = true;
                document.getElementById("rect-btn").disabled = false;
                  pen=1;
                  rect=0;
                  move=0;

              });
              $('#move-btn').click(function () {
                document.getElementById("move-btn").disabled = true;
                document.getElementById("pen-btn").disabled = false;
                document.getElementById("rect-btn").disabled = false;
                  pen=0;
                  rect=0;
                  move=1;

              });
          }

          $(init);


          function showpic(input){

           var reader = new FileReader();
           reader.onload = function(e) {

             var data=e.target.result;
             imgpic=new Image();

             imgpic.onload = function(){

               currentStroke = {
                   type:2,
                   img: imgpic,
               };
               strokes.push(currentStroke);
               currentStroke=null;
               document.getElementById("imgInp").value = "";

               reDraw();
             }
                imgpic.src=data;
           }

           reader.readAsDataURL(input.files[0]);
          }


          function createFont(){


            currentStroke = {
                x:80,
                y: 190,
                text: document.getElementById("min1").value+document.getElementById("min2").value+' - '+document.getElementById("max1").value+document.getElementById("max2").value,
                type:3,
                w:160,
                h:60,
                color: brush.color,
            };
                 strokes.push(currentStroke);
                 currentStroke=null;
                 reDraw();
                 pen=0;
                 rect=0;
                 move=1;

                 document.getElementById("move-btn").disabled = true;
                 document.getElementById("pen-btn").disabled = false;
                 document.getElementById("rect-btn").disabled = false;
          }

        </script>

    <body>


      <center><div class="">


        <div class="top-bar">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
          กำหนดช่องจอดรถ
          </button>
            <button class="btn btn-default" id="save-btn">Save</button>
            <button class="btn btn-default" id="undo-btn">Undo</button>
            <button class="btn btn-default" id="clear-btn">Clear</button>
            <button  class="btn btn-default" id="rect-btn">rect</button>
            <button class="btn btn-default" id="pen-btn">pen</button>
              <button  class="btn btn-default" id="move-btn">move</button>
            <input class="" type="color" id="color-picker">
            <input type="range" id="brush-size" min="1" max="50" value="10">


            <input type='file' class="btn btn-default btn-file" id="imgInp" onchange="showpic(this)" />






        </div>


                <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">กำหนดช่องจอด</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <center>
              <select id="min1" class="" name="">
                <?php for ($i=1; $i <=100 ; $i++) {
                  echo "<option value='".$i."'>".$i."</option>";
                } ?>
              </select>
              <select id="min2"class="" name="">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
                <option value="K">K</option>
                <option value="L">L</option>
                <option value="M">M</option>
                <option value="N">N</option>
                <option value="O">O</option>
              </select>

              <span>ถึง</span>

                <select id="max1"class="" name="">
                  <?php for ($i=1; $i <=100 ; $i++) {
                    echo "<option value='".$i."'>".$i."</option>";
                  } ?>
                </select>
                <select id='max2' class="" name="">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                  <option value="G">G</option>
                  <option value="H">H</option>
                  <option value="I">I</option>
                  <option value="J">J</option>
                  <option value="K">K</option>
                  <option value="L">L</option>
                  <option value="M">M</option>
                  <option value="N">N</option>
                  <option value="O">O</option>
                </select>


              </center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button"id='ok' class="btn btn-primary" data-dismiss="modal" onclick="createFont()">OK</button>
            </div>
          </div>
        </div>
        </div>




        <canvas id="draw" style="border:1px solid #000000;"></canvas>







      </div></center>
    </body>

@endsection
