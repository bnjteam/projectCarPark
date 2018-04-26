
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Parking Owner') }}</div>

                <div class="card-body">

                        <div class="row justify-content-center">
                          <div class="col-7">
                            <div class="card text-white bg-warning mb-3" >

                              <h4 class="card-header" style="text-align:center">PARKING OWNER</h4>
                              <div class="card-body">
                                <div class="card-title" style="margin-top:30px;margin-bottom:30px;text-align:center" >
                                    <h1>$199.00</h1>
                                </div>
                                <p class="card-text">
                                  <div class="">
                                    <div class="text-align:left">
                                      <div class="" style="font-size:20px">
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> Not Limited Numbers Park
                                        </div>
                                        <div class="" style="margin:10px">
                                          <span class="fa fa-check" style="color:green"></span> 4 Months
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </p>

                                <form method="POST" action="/" enctype="multipart/form-data">
                                    @csrf
                                    <div class="" style="text-align:center;margin-top:40px">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                              </div>
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
