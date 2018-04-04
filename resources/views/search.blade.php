@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
          <div class="card-header">{{ __('Search') }}</div>

          <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                  <img src="img/search.png" width="200" class="thumb" alt="a picture">
                  <br>
                  </div>
                </div>
              </div>
              <div><h1>location</h1>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select your park
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">Central World</button>
                    <button class="dropdown-item" type="button">Terminal 21</button>
                    <button class="dropdown-item" type="button">The Mall</button>
                  </div>
                </div>
                <button class="btn btn-primary" type="button" name="button">{{ __('search') }}</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
