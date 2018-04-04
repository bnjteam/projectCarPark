@extends('layouts.app')

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
                  <img src="img/Books-icon.png" width="200" class="thumb" alt="a picture">
                  <br>
                  book
                  </div>
                  <div class="col-md-6">
                  <img src="img/search.png" width="200" class="thumb" alt="a picture">
                  <br>
                  <a class="btn btn-link" href="{{ url('/search') }}">
                      {{ __('search') }}
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
