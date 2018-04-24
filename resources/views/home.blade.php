@extends('layouts.app')
@section('head')
<div class="" style="background-image:url(/storage/01.jpg);padding:100px;background-size: cover;background-repeat: no-repeat;width:100%">
  <div class="row justify-content-center" style="padding:50px;background-color:red">
    <div class="" style="font-size:80px;color:white;font-weight: 800;" >
      Parking on your hand
    </div>
    <div class="col-sm-10">
      <form action="/search" method="POST" role="search" >
      {{ csrf_field() }}
      <div class="input-group" style="border-radius: 5px 0 0 5px;">
          <input type="text" class="form-control" name="search" style="font-size:30px;background-image: url(/storage/pin-icon.svg);padding-left: 40px;background-repeat: no-repeat;background-size: 20px;    background-position: 10px;"
              placeholder="Search location">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-success" style="font-size:30px;padding-right: 60px;background-image: url(/storage/glass-icon.svg);    background-repeat: no-repeat;    background-position: right 25px center;    background-size: 25px;">
                Search
              </button>
              </span>
      </div>
      </form>
    </div>
  </div>
@endsection
@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-sm-11">
          <div class="card">
          <div class="card-header">{{ __('Home') }}</div>
          <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                  <a class="btn btn-link" href="{{ url('/park_reserve') }}">

                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
          <div class="row" style="padding-top:50px;padding-bottom:50px;">
            <div class="col-6 " style="text-align: center">
              <img src="/storage/find.jpg"  width="400px" alt="">
            </div>
            <div class="col-6">
              <div style="font-size:40px;font-weight: 700;margin-top:70px">
                FIND LOCATION
              </div>

            </div>
          </div>

          <div class="row" style="padding-bottom:50px">
            <div class="col-6" style="text-align: center">
              <div  style="font-size:40px;font-weight: 700;margin-top:70px">
                RESERVE & PREPAY
              </div>
              <div class="" style="font-size:20px">
                Book a space in just a few minute
              </div>
            </div>
            <div class="col-6">
              <img src="/storage/reserved-park.jpg" width="400px" alt="">
            </div>
          </div>
          <div class="row" style="">
            <div class="col-6" style="text-align: center">
              <img src="/storage/car.jpg" width="400px" alt="">
            </div>
            <div class="col-6">
              <div  style="font-size:40px;font-weight: 700;margin-top:70px">
                DRIVE ARRIVE & PARK
              </div>

              <div class="" style="font-size:20px">
                Enter the space with your qr code
              </div>
            </div>
          </div>
        </center>
</div>
@endsection
@push('style')
<style>
  .titleBottom {
    font-size:30px;
    color:white;
  }
  .contentBottom{
    font-size:17px;
    color:white;
    margin-left: 15px;
  }
</style>
@endpush
@section('bottom')
<div style="background-image:url(/storage/bg01.jpg);padding-top:30px;padding-bottom:70px;background-size: cover;background-repeat: no-repeat;width:100%">
  <div class="container">
    <div class="row">
      <div class="col-6" style="margin-left:-60px">
        <a href="/"><img src="/storage/logo.png" alt="" width=250px></a>
      </div>
      <div class="col">
        <div class="row">
          <div class="col-5">
            <div class="titleBottom" >
              For Bussiness
            </div>
            <div class="contentBottom">
              <a href="/">create your parking</a>
            </div>
          </div>

          <div class="col-3" >
            <div class="titleBottom">
                Social
            </div>
            <div class="">
              <a href="https://www.facebook.com"><img src="/storage/facebook.png" alt="" width=30px></a>
              <a href="https://www.twitter.com"><img src="/storage/twitter.png" alt="" width=30px></a>
            </div>
          </div>
          <div class="col-4">
            <div class="titleBottom">
                Contact Us
            </div>
            <div class="contentBottom">
              <a href="/contact/sendmail">Send mail</a>
            </div>

          </div>
        </div>

      </div>

    </div>


  </div>
</div>
@endsection
