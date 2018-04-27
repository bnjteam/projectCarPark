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


        </script>

    <body>


      <center><div class="">

        <form method="POST" action="/parkings" enctype="multipart/form-data">
          @csrf

            Location Name:    <input type="text" name="location" value="">
              <br>
              <br>
              <div class="paper">
                 <div class="paper-content">
                Address  <br>  <textarea name="address" rows="8" cols="80"></textarea>
            <input  type="hidden" name="list" value="" id='list'>
          </div>
        </div>
            <br>
            <br>
            Image Location
            <br>
            <input onchange="readURL(this)" type="file" name="fileToUpload2"  value="">
              <center><img id="imageold" style="height:300px;weight:300px;"  src='' > </center>
              <br>


        <button type="submit" name="button" >submit</button>
    </form>

      </div></center>

    </body>
  </div>

    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto);
    @import url(https://fonts.googleapis.com/css?family=Handlee);

    body {

        /* background:  #FFFFCC; */
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
