@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <form action="/search" method="POST" role="search" >
    {{ csrf_field() }}
    <div class="input-group" style="border-radius: 5px 0 0 5px;">
        <div class="" >
        <select name="filter" id="filter" class="form-control input" style="height:100%;width:100%;font-size:30px">
          @foreach($filters as $filter=>$filterValue)
            <option value="{{ $filter }}">{{ $filterValue}}</option>
            @endforeach
        </select>
        </div>
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
    <div class="" style="font-size:30px;margin-left:15px">
      The Search results for your query <b> '{{ $query }}' </b> are :
    </div>
      @for($i = count($details)-1;$i >= 0; $i--,$start++)
        @if ($start ==1)
          <div class="row">
          <div class="col-4" style="padding:10px">
            <div class="card border-primary mb-3" style="height:400px">
              <a href="/parkings/{{$details[$i]->id}}">
              <div class="card-header" style="text-align:center;">{{$details[$i]->location}}</div>
              <div class="card-body">
                <img src="{{$details[$i]->photo}}" width="100%" height="250px" alt="">
                <img src="/storage/pin-icon.svg" style="margin-left:5px;margin-right:5px" alt="" >Location : {{strlen($details[$i]->address) > 60 ? substr($details[$i]->address,0,60)."..." : $details[$i]->address}}
              </div>
              </a>
            </div>
          </div>
        @else
          <div class="col-4" style="padding:10px">
            <div class="card border-primary mb-3" style="height:400px">
              <a href="/parkings/{{$details[$i]->id}}">
              <div class="card-header" style="text-align:center">{{$details[$i]->location}}</div>
              <div class="card-body">
                <img src="{{$details[$i]->photo}}" width="100%" height="250px" alt="">
                <img src="/storage/pin-icon.svg" style="margin-left:5px;margin-right:5px" alt="" >Location : {{strlen($details[$i]->address) > 60 ? substr($details[$i]->address,0,60)."..." : $details[$i]->address}}
              </div>
              </a>
            </div>
          </div>

        @if ($start == 3 || $i == 0)
          <?php $start = 0 ?>
          </div>
        @endif
        @endif
      @endfor
      <div>
  <div class="row justify-content-center">
    <ul class="pagination pagination-md">
      @for ($i=0;$i<= count($details)%6 ;$i++)
        @if ($i==0)
          <li class="page-item disabled">
            <a class="page-link" href="">&laquo;</a>
          </li>
        @elseif ($i==count($details)%6)
          <li class="page-item">
            <a class="page-link" href="#">&raquo;</a>
          </li>
        @elseif ($i == $i)
          <li class="page-item active">
            <a class="page-link" href="#">{{$i}}</a>
          </li>
        @else
          <li class="page-item">
            <a class="page-link" href="#">{{$i}}</a>
          </li>
        @endif
      @endfor
    </ul>
  </div>
</div>
    @else
      <br>
      <div class="" style="padding-top:200px;padding-bottom:200px">
          <h1 class="row justify-content-center" >{{$message ?? ''}}</h1>
      </div>
    @endif
</div>
@endsection
