<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/united.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('style')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <a class="navbar-brand" href="/"><img src="/storage/logo.png" style="margin-left:-50px" alt="" width=150px></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @elseif(Auth::user()->level =='admin')
                        <li class="nav-item"><a class="nav-link" href="{{ url('/parkings') }}">{{ __('PARKINGS MANAGER') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/userManager') }}">{{ __('USERS MANAGER') }}</a></li>
                        <li class="nav-item dropdown" style="background-color:#666699">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span><img style="border-radius: 50%" width='50'  src="{{ Auth::user()->avatar }}" alt=""></span>
                                     สวัสดีคุณ {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" style="background-color:#666699" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('Profile') }}
                                    </a>



                                    <a class="dropdown-item" href="{{ url('/setting') }}">
                                        {{ __('Setting') }}
                                    </a>


                                    <a class="dropdown-item" href="{{ url('/changePW') }}">
                                        {{ __('Change password') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <span><img style="border-radius: 50%" width='50'  src="{{ Auth::user()->avatar }}" alt=""></span>
                                   สวัสดีคุณ {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" style="background-color:#666699" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('Profile') }}
                                    </a>


                                    <a class="dropdown-item" href="{{ url('/setting') }}">
                                        {{ __('Setting') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="">
          @yield('head')
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        <div style="background-image:url(/storage/bg01.jpg);padding-top:30px;padding-bottom:20px;background-size: cover;background-repeat: no-repeat;width:100%">
          <div class="container">
            <div class="row">
              <div class="col-6" style="margin-left:-60px">
                <a href="/"><img src="/storage/logo.png" alt="" width=150px></a>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col-5">
                    <div style="font-size:30px;color:white;">
                      For Bussiness
                    </div>
                    <div style="font-size:17px;color:white;margin-left: 15px;">

                      @if (Auth::check() && Auth::user()->level == "parking_owner")
                        <a href="/parkings/create">create your parking</a>
                      @else
                        <a href="/register_owner">create your parking</a>
                      @endif
                    </div>
                  </div>

                  <div class="col-3" >
                    <div style="font-size:30px;color:white;">
                        Social
                    </div>
                    <div class="">
                      <a href="https://www.facebook.com"><img src="/storage/facebook.png" alt="" width=30px></a>
                      <a href="https://www.twitter.com"><img src="/storage/twitter.png" alt="" width=30px></a>
                    </div>
                  </div>
                  <div class="col-4">
                    <div style="font-size:30px;color:white;">
                        Contact Us
                    </div>
                    <div style="font-size:17px;color:white;margin-left: 15px;">
                      <a href="/contact">Send mail</a>
                    </div>

                  </div>
                </div>

              </div>
              <a href="#top" class="btn btn-info" style="margin-top:100px">
                TOP<span class="iconified iconified-chevron-up iconified-space-left"></span>
              </a>

            </div>


          </div>
        </div>
    </div>
</body>
</html>
