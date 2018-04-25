



@extends('layouts.app')
@section('content')
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->

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
              var imagepass;





          function init () {
              canvas = $('#draw');
              canvas.attr({
                  width: 1100 ,
                  height: 600,
                  // width: window.innerWidth,
                  // height: window.innerHeight,
              });
              ctx = canvas[0].getContext('2d');


              ctx.drawImage(document.getElementById("scream"), 0, 0,1100,600);

              var str = document.getElementById("list").value;
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
                  console.log(r);
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
              console.log(1212);
          }

          $(init);


          function showpic(input){

           var reader = new FileReader();
           reader.onload = function(e) {

             var data=e.target.result;
             imgpic=new Image();
            var  imgpic2=new Image();



             imgpic2.onload = function(){

               currentStroke = {
                   type:2,
                   img: imgpic2,
               };
               strokes.push(currentStroke);
               currentStroke=null;
               // document.getElementById("imgInp").value = "";
               reDraw();


             }
             imgpic2.src=data;
                // imgpic.src=data;
                currentStroke = {
                    type:2,
                    img: imgpic2,
                };
                strokes.push(currentStroke);
                currentStroke=null;
                // document.getElementById("imgInp").value = "";
                reDraw();


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

        <form method="POST" action="/parkings" enctype="multipart/form-data">
          @csrf
          <img hidden id="scream" width="220" height="277" src="{{ $photoslocation->photo }}" alt="The Scream">
              <input  type="hidden" name="list" value="{{ $photoslocation->canvas }}" id='list'>
        <canvas id="draw" style="border:1px solid #000000;"></canvas>
        <br>
        <!-- <button type="submit" name="button" >button</button> -->
    </form>

      </div></center>

    </body>

@endsection
