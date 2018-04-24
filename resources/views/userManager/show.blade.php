@extends('layouts.app')

@section('page-title')
User Detail
@endsection

@section('content')
<center>
<div class="panel panel-default">
    <div class="panel-heading">
    <img style="border-radius: 50%" width='300'  src="{{ $user->avatar }}" alt=""><br><br>
        <h5>Name :{{ $user->name }}</h5>
        <h6>Last Name : {{ $user->lastname }}</h6>
        <p>[ <i class="fa fa-user-circle"> ระดับสมาชิก : </i> 
           {{ $user->level }} ]
           </p>
        
    </div>
    <ul class="list-group">
      <li class="list-group-item">Email: {{ $user->email }}</li>
      <li class="list-group-item">
        Enabled {!! $user->is_enabled ?
          '<i class="fa fa-check"> Yes</i>' : '<i class="fa fa-times"> No </i>' !!}
      </li>
      </li>
      <li class="list-group-item">
        Type of this user: {{ $user->type }}
      </li>
      <li class="list-group-item">
        Joining Date: {{ $user->created_at->diffForHumans() }}
      </li>
    </ul>
    <br>
    <div class="panel-footer">
      <a class="btn btn-primary" role="button"
         href="/userManager/setting/{{ $user->id }}">Edit</a>
      <form action="/userManager/{{$user->id}}" method="post"><br>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
    </div>
</div>
</center>
@endsection