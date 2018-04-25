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

                Address  <br>  <textarea name="address" rows="8" cols="80"></textarea>
            <input  type="hidden" name="list" value="" id='list'>

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

@endsection
