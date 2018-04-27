@extends('layouts.app')
<?php
  use App\Package;
  use App\Package_user;
 ?>
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


      <center><div class="col-8">

        <form method="POST" action="/parkings" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <div class="row justify-content-center">
                <div class="col-2" style="margin-top:10px">
                  Location Name:
                </div>
                <div class="col-7">
                  <input type="text" class="form-control"name="location" value="">
                </div>
              </div>
          </div>
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
            <div class="form-group">
              <div class="row justify-content-center">
                <div class="col-2" style="margin-top:10px">
                  Image Location
                </div>
                <div class="col-7">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this)" name="fileToUpload2" value="" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            <br>
              <center><img id="imageold" style="height:300px;weight:300px;"  src='' > </center>
              <br>
              @if (Package_user::all()->pluck('numbers','id_user')[Auth::user()->id] < Package::all()->pluck('limit','name')[Auth::user()->type])
                <button type="submit" name="button" class="btn btn-primary">Submit</button>
              @else
                <div class="alert alert-dismissible alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Oh !</strong>You have limit of numbers Parking .<br><a href="/register_owner" class="alert-link">click here to Upgrade Package</a> 
                </div>
                <a class="btn btn-primary disabled">Submit</a>
              @endif

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
