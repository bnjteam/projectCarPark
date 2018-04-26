@extends('layouts.app')

@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li ><a href="/userManager">User Manager</a> / </li>
  <li class="active">Users Manager</li>
</ul>
@endsection

@section('content')
<hr><center><p>Change Profile</p></center><hr>
<form action="/userManager/update/{{ $user->id }}" method="post" >

    @csrf
    @method('PUT')

    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right"> Name: </label>
    <input type= "text" name="name" value="{{ old('name') ?? $user->name }}" >
    </div>

    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right"> Lastname: </label>
    <input type= "text" name="lastname" value="{{ old('lastname') ?? $user->lastname }}" >
    </div>

    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right"> User level </label>
    <select name="level123">
    @foreach($level as $key => $value)
        @if((old('level') ?? $user->level) == $key)
            <option value="{{ $key }}" selected>{{ $value }}</option>
        @else
            <option value="{{ $key }}"> {{ $value }} </option>
    @endif
    @endforeach
    </select>
    </div>

    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right"> User Type </label>
    <select name="type">
    @foreach($type as $key=>$value)
        @if((old('type') ?? $user->type) == $key)
            <option value="{{ $key }}" selected>{{ $value }}</option>
        @else
            <option value="{{ $key }}"> {{ $value }} </option>
    @endif
    @endforeach

    </select>
    </div>


    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">E-mail: </label>
    <input type= "text" name="email" value="{{ old('email') ?? $user->email }}">
    </div>

    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Enabled : </label>
    @if((old('enabled123') ?? $user->is_enabled) == 1)

    <input type="radio"  name="enabled123" value=1 checked> Enable        <br>
    <input type="radio"  name="enabled123" value=0>        Not Enable

    @elseif((old('enabled123') ?? $user->is_enabled) == 0)
    <input type="radio"  name="enabled123" value=1>Active<br>
    <input type="radio"  name="enabled123"   value=0 checked>Suspend
    @endif


    <lavel class="col-md-4 col-form-label text-md-right"></label>
    <button  class="btn btn-success"type="submit">Submit</button>



</form>


@endsection
