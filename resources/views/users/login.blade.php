 {{-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<title>Memeber</title>
	

	<!-- STYLESHEETS-->
	<link rel="stylesheet" type="text/css" href="{!!asset('css/libraries/bootstrap/css/bootstrap.min.css')!!}">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<!-- CUSTOM STYLES -->
	<link rel="stylesheet" type="text/css" href="{!!asset('css/assets/css/main.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!!asset('css/assets/css/index.css')!!}">

	<link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">

	
	

	<!-- ICON -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
</head>
<body class="">


	<header>
		<nav class="navbar navbar-default __navbackground" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><img src="assets/img/logo4.png" class="__memlogo"></a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<!-- <ul class="nav navbar-nav">
						<li class="active"><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form> -->
					<ul class="nav navbar-nav navbar-right">
						<!--<li><a href="#" class="__navfont">Talk to leaders in Government</a></li>-->
						<!--<li><a href="meet.html" class="__navfont">Meet and talk to Aspirants</a></li>-->
						<!--<li><a data-toggle="modal" href='#modal-id' class="__navfont"><i class="icon icon-lock" aria-hidden="true"></i> Login</a></li>-->
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li> -->
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header><br>

	<section>

		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3"></div>
				  
  				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="form-card">
						<div class="main text-center">
							<a href="index.html"><img src="assets/img/Logo1.png"></a><br><br>
							<a href="" class="btn __viewbtn">Download the App&nbsp;&nbsp;<span><i class="fas fa-cloud-download-alt"></i></span></a>
						</div>
						<br>
						<div class="row">
							<div class="login-or">
								<hr class="hr-or">
								<span class="span-or">or</span>
							</div>
							
							<center><span>Login with your email</span></center>
							<br>
							<form method="post">
								@csrf
								<div class="form-group">
									<input type="email" required class="form-control" id="inputUsernameEmail" name="email" value="{{old('email')}}" placeholder="Your email">
								</div>
								<div class="form-group">
									<input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Type your password">
								</div>
								
								<button type="submit" class="btn btn-submit-blue pull-right">Login</button>

								<div class="">
									<ul  class="form-card-links list-inline">
										<li><a href="/user/register">Register</a></li>
									</ul>
								</div>
							</form>
						</div>
					</div>
  				</div>
  				<div class="col-lg-4 col-md-4 col-sm-3"></div>
  			</div>
		</div>

		<p class="text-center"><a href="www.raoatech.com" target="_blank"> Powered by <strong>Raoatech</strong></a></p>
	</section>

	<!-- <footer>
		<div class="__foter">
			<p class="text-center"><a href="www.raoatech.com" target="_blank"> Powered by Raoatech</a></p>
		</div>
	</footer>  -
	
	<!-- <footer>
		<div class="__foter">
			<p class="text-center"><a href="www.raoatech.com" target="_blank"> Powered by Raoatech</a></p>
		</div>
	</footer>  -->

		


	<script type="text/javascript" src="{{asset('css/libraries/bootstrap/js/jquery-3.1.1.min.js')}}"></script>

    <script src="{{asset('css/libraries/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('css/assets/js/main.js')}}"></script>
	<script src="{{ asset('js/toastr.min.js') }}"></script>
	<script>
		@if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")

		@elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")

		@elseif(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")

		@endif
	</script>


</body>
</html> --}}

@extends('layouts.Usermaster')
@section('header')
<header>
		<nav class="navbar navbar-default __navbackground" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><img src="{{ asset('css/assets/img/logo.jpeg')}}" class="__memlogo"></a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
							<li><a href="/user/index" class="__navfont">Home</a></li>
							<li><a href="/user/index" class="__navfont">News & Events</a></li>
							<li><a href="/user/donate" class="__navfont">Donate</a></li>
							<li><a href="/user/login" class="__navfonta"></i> Login</a></li>
							<li><a href="/user/register" class="__navfont">Register</a></li>
						
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header>
@endsection
@section('content')
<section>

		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3"></div>
				  
  				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="form-card">
						<div class="main text-center">
						{{-- <a href="index.html"><img src="{{asset('css/assets/img/Logo1.png')}}"></a><br><br> --}}
							<a href="https://play.google.com/store/apps/details?id=com.raoatech.talk2government" class="btn __viewbtn">Download the App&nbsp;&nbsp;<span><i class="fas fa-cloud-download-alt"></i></span></a>
						</div>
						<br>
						<div class="row">
							<div class="login-or">
								<hr class="hr-or">
								<span class="span-or">or</span>
							</div>
							
							<center><span>Login with your email</span></center>
							<br>
							<form method="post">
								@csrf
								<div class="form-group">
									<input type="text" class="form-control" id="inputUsernameEmail" name="email" value="{{old('email')}}" placeholder="Your email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Type your password">
								</div>
								<button type="submit" class="btn btn-submit-blue pull-right">Login</button>
								<div class="">
									<ul  class="form-card-links list-inline">
										<li><a href="register.html">Register</a></li>
									</ul>
								</div>
							</form>
						</div>
					</div>
  				</div>
  				<div class="col-lg-4 col-md-4 col-sm-3"></div>
  			</div>
		</div>
		<p class="text-center"><a href="www.raoatech.com" target="_blank"> Powered by <strong>Raoatech</strong></a></p>
	</section>
@endsection