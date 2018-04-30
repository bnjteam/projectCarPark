<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- <script type="text/javascript">
      setInterval( function() {
          console.log('123');
             $.ajax({
               type: "get",
              url: "/check",
            });
       }, 5000);
  </script> -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/united.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
      use App\Package;
      use App\Package_user;

    ?>
    @stack('style')
<style >
.cssload-box-loading {
width: 49px;
height: 49px;
margin: auto;
position: absolute;
left: 0;
right: 0;
top: 0;
bottom: 0;
}
.cssload-box-loading:before {
content: '';
width: 49px;
height: 5px;
background: rgb(0,0,0);
opacity: 0.1;
position: absolute;
top: 58px;
left: 0;
border-radius: 50%;
animation: shadow 0.58s linear infinite;
-o-animation: shadow 0.58s linear infinite;
-ms-animation: shadow 0.58s linear infinite;
-webkit-animation: shadow 0.58s linear infinite;
-moz-animation: shadow 0.58s linear infinite;
}
.cssload-box-loading:after {
content: '';
width: 49px;
height: 49px;
background: rgb(26,54,104);
position: absolute;
top: 0;
left: 0;
border-radius: 3px;
animation: cssload-animate 0.58s linear infinite;
-o-animation: cssload-animate 0.58s linear infinite;
-ms-animation: cssload-animate 0.58s linear infinite;
-webkit-animation: cssload-animate 0.58s linear infinite;
-moz-animation: cssload-animate 0.58s linear infinite;
}



@keyframes cssload-animate {
17% {
border-bottom-right-radius: 3px;
}
25% {
transform: translateY(9px) rotate(22.5deg);
}
50% {
transform: translateY(18px) scale(1, 0.9) rotate(45deg);
border-bottom-right-radius: 39px;
}
75% {
transform: translateY(9px) rotate(67.5deg);
}
100% {
transform: translateY(0) rotate(90deg);
}
}

@-o-keyframes cssload-animate {
17% {
border-bottom-right-radius: 3px;
}
25% {
-o-transform: translateY(9px) rotate(22.5deg);
}
50% {
-o-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
border-bottom-right-radius: 39px;
}
75% {
-o-transform: translateY(9px) rotate(67.5deg);
}
100% {
-o-transform: translateY(0) rotate(90deg);
}
}

@-ms-keyframes cssload-animate {
17% {
border-bottom-right-radius: 3px;
}
25% {
-ms-transform: translateY(9px) rotate(22.5deg);
}
50% {
-ms-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
border-bottom-right-radius: 39px;
}
75% {
-ms-transform: translateY(9px) rotate(67.5deg);
}
100% {
-ms-transform: translateY(0) rotate(90deg);
}
}

@-webkit-keyframes cssload-animate {
17% {
border-bottom-right-radius: 3px;
}
25% {
-webkit-transform: translateY(9px) rotate(22.5deg);
}
50% {
-webkit-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
border-bottom-right-radius: 39px;
}
75% {
-webkit-transform: translateY(9px) rotate(67.5deg);
}
100% {
-webkit-transform: translateY(0) rotate(90deg);
}
}

@-moz-keyframes cssload-animate {
17% {
border-bottom-right-radius: 3px;
}
25% {
-moz-transform: translateY(9px) rotate(22.5deg);
}
50% {
-moz-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
border-bottom-right-radius: 39px;
}
75% {
-moz-transform: translateY(9px) rotate(67.5deg);
}
100% {
-moz-transform: translateY(0) rotate(90deg);
}
}

@keyframes shadow {
0%,
100% {
transform: scale(1, 1);
}
50% {
transform: scale(1.2, 1);
}
}

@-o-keyframes shadow {
0%,
100% {
-o-transform: scale(1, 1);
}
50% {
-o-transform: scale(1.2, 1);
}
}

@-ms-keyframes shadow {
0%,
100% {
-ms-transform: scale(1, 1);
}
50% {
-ms-transform: scale(1.2, 1);
}
}

@-webkit-keyframes shadow {
0%,
100% {
-webkit-transform: scale(1, 1);
}
50% {
-webkit-transform: scale(1.2, 1);
}
}

@-moz-keyframes shadow {
0%,
100% {
-moz-transform: scale(1, 1);
}
50% {
-moz-transform: scale(1.2, 1);
}
}
@-webkit-keyframes spin {
0% { -webkit-transform: rotate(0deg); }
100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
position: relative;
-webkit-animation-name: animatebottom;
-webkit-animation-duration: 1s;
animation-name: animatebottom;
animation-duration: 1s
}

@-webkit-keyframes animatebottom {
from { bottom:-100px; opacity:0 }
to { bottom:0px; opacity:1 }
}

@keyframes animatebottom {
from{ bottom:-100px; opacity:0 }
to{ bottom:0; opacity:1 }
}
#myDiv {
  display: none;
  text-align: center;
}

    .fixed-top {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
    }

    .footer{
      position:absolute;
      width:100%;
      bottom: 5;
    }
}
</style>


</head>
<body>


    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <a class="navbar-brand" href="/"><img src="/storage/logo.png" style="margin-left:-50px" alt="" width=150px></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <div class="">
                        <!-- <div style="font-family: 'Jua', sans-serif;font-size:30px;color:white;">
                          For Bussiness
                        </div> -->
                        <div style="font-size:17px;color:white;margin-left: 15px;">
                          <ul class="navbar-nav ml-auto">
                          @if (Auth::check() && Auth::user()->level=="admin" )
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/register_owner">Regist Owner</a></li>
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/parkings/create">Create Your Parking</a></li>
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/package">Upgrade Package</a></li>
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/package">Buy Package to reserve </a></li>
                          @elseif (Auth::check() && Auth::user()->level=="member" )
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/package">Upgrade Package</a></li>
                          @elseif (Auth::check() && Auth::user()->level == "parking_owner")
                            @if (Package_user::all()->pluck('numbers','id_user')[Auth::user()->id] < Package::all()->pluck('limit','name')[Auth::user()->type])
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/parkings/create">Create Your Parking</a></li>
                            @else
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/register_owner">Create Your Parking</a></li>
                            @endif
                            <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/register_owner">Upgrade Package</a></li>
                          @else
                            <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/register_owner">Create Your Parking</a></li>
                            <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="/package">Buy Package to reserve </a></li>
                          @endif
                          </ul>
                        </div>
                      </div>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @elseif(Auth::user()->level =='admin' or Auth::user()->level =='parking_owner')
                            <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="{{ url('/parkings') }}">{{ __('PARKINGS MANAGER') }}</a></li>
                            @if (Auth::user()->level =='admin')
                              <li class="navbar-collapse collapse"><a style="font-family: 'Jua', sans-serif;" class="nav-link" href="{{ url('/userManager') }}">{{ __('USERS MANAGER') }}</a></li>
                        @endif
                        <li class="nav-item dropdown" style="background-color:#666699">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                      @if ( !file_exists( Auth::user()->avatar ) )
                                        <img style="border-radius: 50%" width='50'  src="{{ Auth::user()->avatar }}" alt="">
                                      @else
                                      <img style="border-radius: 50%" width='50'  src="/storage/noimage.png" alt="">
                                      @endif
                                      </span>
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
                                  <span>
                                    @if ( !file_exists( Auth::user()->avatar ) )
                                      <img style="border-radius: 50%" width='50'  src="{{ Auth::user()->avatar }}" alt="">
                                    @else
                                      <img style="border-radius: 50%" width='50'  src="/storage/noimage.png" alt="">
                                    @endif
                                  </span>
                                   สวัสดีคุณ {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" style="background-color:#666699" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="/parkings/info">
                                        {{ __('My reserve info') }}
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


        <main class="">

          <br>
          <br>
            @yield('head')
              <div class=""  style="padding:50px">
                  @yield('content')
              </div>
        </main>
    </div>
    <footer id="footer" >
      <div style="background-image:url(/storage/bg01.jpg);padding-top:30px;padding-bottom:20px;background-size: cover;background-repeat: no-repeat;width:100%">
        <div class="container">
          <div class="row">
            <div class="col-6" style="margin-left:-60px">
              <a href="/"><img src="/storage/logo.png" alt="" width=150px></a>
            </div>
            <div class="col">
              <div class="row">
                <div class="col-5">
                  <div style="font-family: 'Jua', sans-serif;font-size:30px;color:white;">
                    For Bussiness
                  </div>
                  <div style="font-size:17px;color:white;margin-left: 15px;">




                      @if (Auth::check() && Auth::user()->level == "parking_owner")
                        @if (Package_user::all()->pluck('numbers','id_user')[Auth::user()->id] < Package::all()->pluck('limit','name')[Auth::user()->type])
                          <a style="font-family: 'Jua', sans-serif;" href="/parkings/create">Create Your Parking</a>
                        @else
                          <a style="font-family: 'Jua', sans-serif;" href="/register_owner">Create Your Parking</a>
                        @endif
                      @else
                        <a style="font-family: 'Jua', sans-serif;" href="/register_owner">Create Your Parking</a>
                      @endif

                  </div>
                </div>
                <div class="col-3" >
                  <div style="font-family: 'Jua', sans-serif;font-size:30px;color:white;">
                      Social
                  </div>
                  <div class="">
                    <a href="https://www.facebook.com"><img src="/storage/facebook.png" alt="" width=30px></a>
                    <a href="https://www.twitter.com"><img src="/storage/twitter.png" alt="" width=30px></a>
                  </div>
                </div>
                <div class="col-4">
                  <div style="font-size:30px;color:white;font-family: 'Jua', sans-serif;">
                      Contact Us
                  </div>
                  <div style="font-family: 'Jua', sans-serif;font-size:17px;color:white;margin-left: 15px;">
                    <a href="/contact">Send mail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
              <a href="#top" class="btn btn-info" >
                TOP<span class="iconified iconified-chevron-up iconified-space-left"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>


</body>


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
</html>
