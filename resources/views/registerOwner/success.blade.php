
@push('style')
<script>
  var myVar;


  function myFunction() {
      myVar = setTimeout(showPage, 600);
  }
  function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
  }
  </script>
@endpush




@extends('layouts.app')

@section('content')
<body style-="height:100%;position:relative" id="page" onload="myFunction()" style="margin:0;">
  <div id="loader" class="cssload-box-loading">
  </div>
  <div style="display:none;" id="myDiv" class="animate-bottom" style="">
    <div class="container">
      <div class="row justify-content-center ">
        <div class="col-10">
          <div class="card border-primary ">
            <div class="card-header" style="text-align:center">Register Park Owner</div>
            <div class="card-body">
              <div class="" >
                <div class="row justify-content-center">
                    @if (!file_exists( '/storage/check.gif' ))
                      <img src="/storage/check.gif" loop=1 alt="" style="padding:20px">
                    @else
                      <img src="/storage/noimage.png" alt="" style="padding:20px">
                    @endif
                </div>
                <h3 style="text-align:center">Success</h3>
                <p class="card-text" style="text-align:center">you have register completed.</p>
                <div class="" style="text-align:center">
                    <a href="/parkings/create" class="btn btn-primary" >Create the parking</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</body>





@endsection
