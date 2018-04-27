
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <h1>{{ __('Register Parking Owner') }}</h1>
        <div class="col-12">
                <div class="card-body">
                        <div class="row justify-content-center">
                          <div class="col-4">
                            <div class="card text-white bg-warning mb-3" >
                              <h4 class="card-header" style="text-align:center">SMALL</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$299.99</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Limited 1 Park
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> 4 Months
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>
                                    <div class="" style="text-align:center;margin-top:40px">
                                      @if (Auth::user()->type!="small" && Auth::user()->level!="admin")
                                        <a href="/register_owner/payments/small" class="btn btn-primary">{{ __('Register') }}</a>
                                      @else
                                        <a href="/register_owner/payments/small" class="btn btn-primary disabled">{{ __('Registed') }}</a>
                                      @endif

                                    </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="card text-white bg-info mb-3" >

                              <h4 class="card-header" style="text-align:center">MEDIUM</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$599.99</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Limited 2 Park
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> 8 Months
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>

                                <div class="" style="text-align:center;margin-top:40px">
                                  @if (Auth::user()->type!="medium" && Auth::user()->level!="admin")
                                    <a href="/register_owner/payments/medium" class="btn btn-primary">{{ __('Register') }}</a>
                                  @else
                                    <a href="/register_owner/payments/medium" class="btn btn-primary disabled">{{ __('Registed') }}</a>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="card text-white bg-secondary mb-3" >

                              <h4 class="card-header" style="text-align:center">LARGE</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$999.99</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Limited 5 Park
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> 12 Months
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>

                                <div class="" style="text-align:center;margin-top:40px">
                                  @if (Auth::user()->type!="large" && Auth::user()->level!="admin")
                                    <a href="/register_owner/payments/large" class="btn btn-primary">{{ __('Register') }}</a>
                                  @else
                                    <a href="/register_owner/payments/large" class="btn btn-primary disabled">{{ __('Registed') }}</a>
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
