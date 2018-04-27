@extends('layouts.app')

@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li ><a href="/userManager">User Manager</a> / </li>
  <li class="active">Users Manager</li>
</ul>
@endsection

@section('content')
<script>
function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#imageold').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
          <div class="card-header">{{ __('Admin Setting') }}</div>

          <div class="card-body">
<center>
<div class="panel-heading">
<img style="border-radius: 50%" width='300'  src="{{ $user->avatar }}" alt=""><br><br>
</div>
</center>
<form action="/userManager/update/{{ $user->id }}" method="post" enctype="multipart/form-data" >

    @csrf
    @method('PUT')


    <div class="form-group row">
        <div class="input-group mb-3">
          <div class="custom-file">
          <input class="custom-file-input" id="inputGroupFile02" onchange="readURL(this)"   type="file" name="fileToUpload" >
          <label class="custom-file-label"  for="inputGroupFile02">Please Choose Avatar Image</label>

          </div>
          <center><img id="imageold" style="height:150px;weight:150px;"  src=''> </center>

        </div>
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

        </div>
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
    <label class="col-md-4 col-form-label text-md-right"> User Package </label>
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
    <input type= "text"  name="email" value="{{ old('email') ?? $user->email }}">
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right"> Status : {!! $user->is_enabled ?
      '<i class="fa fa-check">Active</i>' : '<i class="fa fa-times">Suspend</i>' !!} </label>

    </div>


    <label class="col-md-4 col-form-label text-md-right"></label>
    <button  class="btn btn-success"type="submit">Submit</button>



</form>
</div>
</div>
</div>
</div>
</div>

@endsection
