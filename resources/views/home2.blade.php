@extends('layouts.app')

@section('head')

<div class="">
  <div class="row">
    <div class="col-sm-6" style="padding:0;">
      <img src="storage/01.jpg" width='100%' height='100%'  alt="a picture">
    </div>
    <div class="col-sm-6" style="padding:0">
      <img src="storage/02.jpg" width='100%' height='100%'  alt="a picture">
    </div>
  </div>
</div>


@endsection
@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
          <div class="card">
          <div class="card-header">{{ __('Home') }}</div>

          <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                  <a class="btn btn-link" href="{{ url('/park_reserve') }}">
                      {{ __('reserve') }}
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
