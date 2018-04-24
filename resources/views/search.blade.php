@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
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
    @if(isset($details))
    <div class="">
      The Search results for your query <b> {{ $query }} </b> are :
    </div>


      @for($i = 0;$i < count($details); $i++)
        @if ($i%3==0)
          <div class="row">
          <div class="col-4" style="padding:30px">
            <img src="/storage/reserved-park.jpg" alt="">
            <div class="">
              <img src="/storage/pin-icon.svg" alt="">
              <a href="/">{{$details[$i]->location}}</a>
            </div>
            <div class="">
                {{$details[$i]->address}}
            </div>
          </div>

        @else
          <div class="col-4" style="padding:30px">
            <img src="/storage/reserved-park.jpg" alt="">
            <div class=""><img src="/storage/pin-icon.svg" alt="">
              <a href="/">{{$details[$i]->location}}</a>
            </div>
            <div class="">
                {{$details[$i]->address}}
            </div>
          </div>
          @if ($i%3==2 || $i==count($details)-1)
            </div>
          @endif

        @endif
      @endfor
    @else
      <br>
      <h1 class="row justify-content-center" style="margin-top:100px">{{$message ?? ''}}</h1>
    @endif
</div>

@endsection
