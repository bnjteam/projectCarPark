@extends('layouts.app')
<script type="text/javascript">
  var height_page = document.body.offsetHeight ? document.body.offsetHeight : document.height;
  function getWindowSize() {
      var win_size = new Array;
      if (self.innerHeight) {
        win_size['height'] = self.innerHeight;
        win_size['width'] = self.innerWidth;
      } else if (document.documentElement && document.documentElement.clientHeight) {
        win_size['height'] = document.documentElement.clientHeight;
        win_size['width'] = document.documentElement.Width;
      } else if (document.body) {
        win_size['height'] = document.body.clientHeight;
        win_size['width'] = document.body.clientWidth;
      }
      return win_size;
    }
    var win_dim = getWindowSize();
    var height_win = win_dim['height']-100;
  if (height_win < height_page){
    console.log('height Window: '+height_win,'height Page :'+height_page);
    console.log('win_less');
  }
  else{
    $('#footer').addClass('footer');
    console.log('height Window: '+height_win,'height Page :'+height_page);
    console.log("page les");
  }
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
