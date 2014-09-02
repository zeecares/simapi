<html>
<head>
    <title>BCVTB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	 <p>&nbsp;</p>
     <p>&nbsp;</p>

      @if (Session::get('flash_message'))
      <div class="flash">
        {{ Session::get('flash_message') }}
     </div>
     @endif
     <div class="container">
       @yield('content')
     </div>
     @if(Session::has('global'))
     <p>
       {{ Session::get('global')}}
     </p>
     @endif   
     <hr />
 </div>	
 
<!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top">
     <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" >BCVTB API</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="{{URL::route('document')}}">API Documentation</a></li>
		<li><a href="http://docs.simulapi.apiary.io/">API Blueprint</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		   @if(Auth::check())
	      <li><a href="{{URL::route('accounts-logout')}}">Sign out</a></li>
	      <li><a href="{{URL::route('accounts-change-password')}}">Change Password</a></li>
	      @else
	      <li><a href="{{URL::route('accounts-login')}}">Sign in</a></li>
	      <li><a href="{{URL::route('accounts-create')}}">Sign up</a></li>
	      <li><a href="{{URL::route('accounts-forgot')}}">Forgot password</a></li>
          @endif
          </ul>
        </li>
      </ul>  
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid --> 
</nav> 

<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
</html>