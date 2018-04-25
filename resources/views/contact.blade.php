@extends('layouts.app')
@section('content')
<div class="container">

<form action="/contact" method="POST">
  @csrf
  <div class="row justify-content-center">
    <div class="col-7">
      <legend>Contact Us</legend>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">To Email : </label>
        <div class="col-sm-10">
          <input type="text" readonly="" class="form-control-plaintext" name="email" id="staticEmail" value="{{$admin->email}}">
        </div>
      </div>
      <div class="form-group">
        <label>From (name) :</label>
        <input type="text" class="form-control" name="name" value="">
      </div>
      <div class="form-group">
        <label>Your email </label> (to contact you back) : 
        <input type="email"class="form-control" name="emailUser" value="">
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Description :</label>
        <textarea class="form-control" name="description" id="exampleTextarea" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>
@endsection
