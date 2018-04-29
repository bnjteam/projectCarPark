
@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center ">
    <div class="col-10">
      <div class="card border-primary ">
        <div class="card-header" style="text-align:center">Buy Package</div>
        <div class="card-body">
          <div class="" >
            <div class="row justify-content-center">
                <img src="/storage/check.gif" loop=1 alt="" style="padding:20px">
            </div>
            <h3 style="text-align:center">Success</h3>
            <p class="card-text" style="text-align:center">you have buy package.</p>
            <div class="" style="text-align:center">
                <a href="/search" class="btn btn-primary" >Go to reserve</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
