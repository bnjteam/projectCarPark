@extends('layouts.app')

@section('head')
<ul class="breadcrumb">
  <li><a href="/home">Home</a> / </li>
  <li class = "active">Profile</a></li>
</ul>

@endsection
@section('content')

<head>
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
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if (isset($aleartMesg))
            <div class="alert alert-dismissible alert-warning">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4 class="alert-heading">Warning!</h4>
              <p class="mb-0">{{$aleartMesg}}</p>
            </div>

          @endif
          <div class="card">
          <div class="card-header">{{ __('Setting') }}</div>

          <div class="card-body">
          <center>
<div class="panel-heading">

    <img id="imageold" style="border-radius: 50%" width='300'  src="{{ Auth::user()->avatar }}" alt=""><br><br>
</div>

            <form method="POST" action="/home/{{ Auth::user()->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group row">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                      <input class="custom-file-input" id="inputGroupFile02" onchange="readURL(this)"   type="file" name="fileToUpload" ><br>
                      <label class="custom-file-label"  for="inputGroupFile02">Please Choose Avatar Image</label>

                      </div>
                      <center><img id="imageold" style="height:150px;weight:150px;"  src=''> </center>

                    </div>
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>

                    </div>


                <!-- <div class="form-group row">
                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                    <div class="col-md-6">
                      <input onchange="readURL(this)"   type="file" name="fileToUpload" value=""><br>
                        <center><img id="imageold" style="height:150px;weight:150px;"  src='' > </center>
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>


                    </div>
                </div> -->


                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{ old('name') ?? Auth::user()->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') ?? Auth::user()->lastname }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback">

                                    <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" disabled type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ Auth::user()->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><hr><center><p>Confirm Password</p></center><hr>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Change') }}
                        </button>
                    </div>
                </div>
            </form>
          </div>
          </div>
        </div>
    </div>
</div>
@endsection
