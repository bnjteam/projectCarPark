@extends('layouts.app')
@section('content')
<div class="container">

<form action="/contact" method="POST">
  @csrf
  <div class="row justify-content-center">
    <div class="col-7">
      <legend>Contact Us</legend>
      <div class="form-group">
        <fieldset>
          <label class="control-label" for="readOnlyInput">To Email : </label>
          <input class="form-control" name="email" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly="" value={{$admin->email}}>
        </fieldset>
      </div>

      <div class="form-group">
        <label>Your name :</label>
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
