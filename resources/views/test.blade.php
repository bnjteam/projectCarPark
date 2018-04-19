<html>
    <head>
        <meta charset="utf-8">
        <title>Draw</title>

        <style media="screen">
        body {
            margin: 0;
        }

        .top-bar {
            display: flex;
            flex-direction: row;
            background-color: #3af;
            border-bottom: 2px solid black;
            position: absolute;
            width: 100%;
        }

        .top-bar * {
            margin: 5px 10px;
        }

        #draw {
            display: block;
        }

        </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
          <script type="text/javascript">

          </script>
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

                    ctx.drawImage(s.img, 0, 0);
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
              ctx.beginPath();
            ctx.font = "30px Arial";
              ctx.fillText(s.text,s.x,s.y);

              if (target==s){
                ctx.rect(s.x-20, s.y-40,s.w, s.h);
                ctx.stroke();
              }

          }



          function init () {
              canvas = $('#draw');
              canvas.attr({
                  width: window.innerWidth,
                  height: window.innerHeight,
              });
              ctx = canvas[0].getContext('2d');


              function mouseEvent (e) {
                if(pen==1){

                  brush.x = e.pageX;
                  brush.y = e.pageY;
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

                for (var i = 0; i < strokes.length; i++) {
                  if(strokes[i].type==3){
                    if(strokes[i].x-20 <= e.pageX && e.pageX<=strokes[i].x+180  && strokes[i].y-40<=e.pageY && e.pageY<=strokes[i].y+20){
                      console.log(direct);
                      textmove=1;
                      if(target==null){
                          target=strokes[i];
                      }
                        break;
                    }
                  }
                }


                console.log('down');
                  brush.down = true;
                  if (rect==1){
                    if (currentStroke==null){
                      currentStroke = {
                          type:1,
                          color: brush.color,
                          size: brush.size,
                          points: [],
                      };
                      currentStroke.points.push({
                          x: e.pageX,
                          y: e.pageY,
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

                textmove=0;
                target=null;
                  brush.down = false;

                  if (rect==1){
                    if (currentStroke!=null){
                      currentStroke.points.push({
                          x: e.pageX,
                          y: e.pageY,
                      });
                    }
                    strokes.push(currentStroke);

                  }
                  currentStroke = null;
                  reDraw();
              }).mousemove(function (e) {
                  direct=0;
                  if(target!=null){
                    target.x=e.pageX-60;
                      target.y=e.pageY+20;
                      reDraw();
                  }

                  if (e.pageX > mx){
                      direct=1;
                  } else if( e.pageX < mx){
                      direct=2;
                  }else if( e.pageY > my){
                      direct=3;
                  }else if( e.pageY < my){
                      direct=4;
                  }



              mx=e.pageX;
              my=e.pageY;

                if (rect==1){
                  if (brush.down){
                    reDraw();
                    ctx.strokeStyle = currentStroke.color;
                    ctx.lineWidth = currentStroke.size;
                      ctx.beginPath();
                      ctx.rect(currentStroke.points[0].x, currentStroke.points[0].y, e.pageX-currentStroke.points[0].x, e.pageY-currentStroke.points[0].y);
                      ctx.stroke();
                  }
                }
                if(pen==1){
                    mouseEvent(e);
                }

              });

              $('#save-btn').click(function () {
                  window.open(canvas[0].toDataURL());
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
                  rect=1;
                    pen=0;

              });

              $('#pen-btn').click(function () {
                  pen=1;
                  rect=0;

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

            console.log(  document.getElementById("min1").value);
              console.log(  document.getElementById("min2").value);
                console.log(  document.getElementById("max1").value);
                  console.log(  document.getElementById("max2").value);

            currentStroke = {
                x:80,
                y: 190,
                text: document.getElementById("min1").value+document.getElementById("min2").value+' - '+document.getElementById("max1").value+document.getElementById("max2").value,
                type:3,
                w:160,
                h:60,
            };
                 strokes.push(currentStroke);
                 reDraw();
                 pen=0;
                 rect=0;
          }



        </script>
    </head>
    <body>
        <div class="top-bar">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          กำหนดช่องจอด
          </button>
            <button id="save-btn">Save</button>
            <button id="undo-btn">Undo</button>
            <button id="clear-btn">Clear</button>
            <button id="rect-btn">rect</button>
            <button id="pen-btn">pen</button>
            <input type="color" id="color-picker">
            <input type="range" id="brush-size" min="1" max="50" value="10">

            <input type='file' id="imgInp" onchange="showpic(this)" />





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




        <canvas id="draw"></canvas>








    </body>
</html>
