@extends('layouts.app')
@push('style')

<style >

.flex-container {
  display: flex;

}

.flex-container > div {
  background-color: #CCCCCC;

  margin-left:30px;
  width: 345px;
  font-size: 30px;
  margin-bottom: 170px;
}
.block{
	text-align: center;
}
.price{
	text-align: center;
	background-color:#778899 ;
}
#button{
	width: 320px;
	height: 45px;
}
.head{
	font-size: 50px;
	margin-left: 40px;
}
.font{
	font-size: 20px;
}
</style>
@endpush
@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
      <h1>{{ __("Package's Reserve ") }}</h1>
        <div class="col-12">
                <div class="card-body">

                        <div class="row justify-content-center">
                          <div class="col-4">
                            <div class="card text-white bg-warning mb-3" >

                              <h4 class="card-header" style="text-align:center">Daily</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$3.99</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Limited 1 Day
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Time : 24 Hour
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> สามารถจองได้ 1 ที่
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-times" style="color:green"></span> ไม่สามารถสร้างที่จอดรถ
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>
                                    <div class="" style="text-align:center;margin-top:40px">
                                      @if (Auth::user()->type=="daily")
                                        <a href="" class="btn btn-primary disabled">{{ __('Bought') }}</a>
                                      @elseif (Auth::user()->level=="parking_owner" || Auth::user()->level=="admin" || Auth::user()->type=="monthly" || Auth::user()->type=="weekly")
                                        <a href="" class="btn btn-primary disabled">{{ __("Can't Buy") }}</a>
                                      @elseif (Auth::user()->type!="daily" && Auth::user()->level!="admin")
                                        <a href="/payments/daily" class="btn btn-primary">{{ __('Buy Package') }}</a>
                                      @endif

                                    </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="card text-white bg-info mb-3" >

                              <h4 class="card-header" style="text-align:center">Weekly</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$15.99</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Limited 7 Days
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Time : 24 Hour
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> สามารถจองได้ 1 ที่
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-times" style="color:green"></span> ไม่สามารถสร้างที่จอดรถ
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>

                                <div class="" style="text-align:center;margin-top:40px">
                                  @if (Auth::user()->type=="weekly")
                                    <a href="" class="btn btn-primary disabled">{{ __('Bought') }}</a>
                                  @elseif (Auth::user()->level=="parking_owner"  || Auth::user()->level=="admin" || Auth::user()->type=="monthly")
                                    <a href="" class="btn btn-primary disabled">{{ __("Can't Buy") }}</a>
                                  @elseif (Auth::user()->type!="weekly" && Auth::user()->level!="admin")
                                    <a href="/payments/weekly" class="btn btn-primary">{{ __('Buy Package') }}</a>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="card text-white bg-secondary mb-3" >

                              <h4 class="card-header" style="text-align:center">Monthly</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$45.99</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Limited 30 Days
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Time : 24 Hour
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> สามารถจองได้ 1 ที่
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-times" style="color:green"></span> ไม่สามารถสร้างที่จอดรถ
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>

                                <div class="" style="text-align:center;margin-top:40px">
                                  @if (Auth::user()->type=="monthly")
                                    <a href="" class="btn btn-primary disabled">{{ __('Bought') }}</a>
                                  @elseif (Auth::user()->level=="parking_owner" || Auth::user()->level=="admin")
                                    <a href="" class="btn btn-primary disabled">{{ __("Can't Buy") }}</a>
                                  @elseif (Auth::user()->type!="monthly" && Auth::user()->level!="admin")
                                    <a href="/payments/monthly" class="btn btn-primary">{{ __('Buy Package') }}</a>

                                  @endif

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>


            </div>
        </div>
    </div>



@endsection
