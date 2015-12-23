<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->

  <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <style>
  body {
    font-family: 'Lato';
  }

  .fa-btn {
    margin-right: 6px;
  }
  </style>
</head>
<body id="app-layout">
  <style type="text/css">
    .notice{
      position: fixed;
      top: 10%;
      left: 30%;
      width: 40%;
      line-height: 30px;
      text-align: center;
      overflow: auto;
      z-index: 4000;
      color:#fff;
      font-size:20px;
      padding:10px 10px 10px 10px;
      border-radius: 5px;
    }
    .notice-success{
      background-color: #5cb85c;
    }
    .notice-fail{
      background-color: #d9534f;
    }
  </style>
  @if(Session::has('success'))
  <div id="notice" class="notice notice-success">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('fail'))
    <div id="notice" class="notice notice-fail">
        {{ Session::get('fail') }}
    </div>
  @endif
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="/">
          <img src="{!! asset('assets/egov_logo.png') !!}" class="nav-logo">
        </a>
      </div>

      <div class="collapse navbar-collapse" id="spark-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li><a href="/">Home</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="/login">Login</a></li>

          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li><a href="/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
          @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{!! asset('js/jquery-2.1.4.min.js') !!}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
<script type="text/javascript">
	if(document.getElementById("notice")!== null)
    $('#notice').delay(3000).fadeOut(1000);
  $(document).ready(function(){
	  $('.alert').fadeOut( 3000 );
	});
</script>
