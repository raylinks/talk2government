@extends('layouts.Usermaster')
@section('header-container')
<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-7">
			<h1 class="__brid">Bridging the gap between<br> the people and the government.</h1>
			<p class="__quote">I'm a great believer that any tool that enhances communication has profound effects in terms of how people can learn from each other, and how they can achieve the kind of freedoms that they're interested in. <b>- Bill Gates</b></p>
			<p class="__talkto">
				<a href="/user/meet" class="btn">Talk to Aspirants</a>
			<a href="https://play.google.com/store/apps/details?id=com.raoatech.talk2government"><img src="{{asset('css/assets/img/playstore.png')}}"></a>
			</p>
			<p class="__playimg"></p>
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5">
		</div>
	</div>
</div>
@endsection
@section('header')
<header>
	<div class="__talgbg">
		<nav class="navbar navbar-default __navbackground" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a class="navbar-brand" href="index.html"><img src="{{asset('css/assets/img/logo.jpeg')}}" class="__memlogo"></a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/user/index" class="__navfonta">Home</a></li>
						<li><a href="/user/index" class="__navfont">News & Events</a></li>
						<li><a href="/user/donate" class="__navfont">Donate</a></li>
						<li><a href="/user/login" class="__navfont"></i> Login</a></li>
						<li><a href="/user/register" class="__navfont">Register</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7 col-sm-7">
					<h1 class="__brid">Bridging the gap between<br> the people and the government.</h1>
					<p class="__quote">I'm a great believer that any tool that enhances communication has profound effects in terms of how people can learn from each other, and how they can achieve the kind of freedoms that they're interested in. <b>- Bill Gates</b></p>
					<p class="__talkto">
						<a href="/user/meet" class="btn">Talk to Aspirants</a>
					<a href="https://play.google.com/store/apps/details?id=com.raoatech.talk2government"><img src="{{asset('css/assets/img/playstore.png')}}"></a>
					</p>
					<p class="__playimg"></p>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-5">
				</div>
			</div>
		</div>
	</div>
</header>
@endsection
@section('content')
<section>
	<div class="container">
		<div class="__appabou  mt-10p">
			<p>About Our APP</p>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-3">
					<hr>
				</div>
				<div class="col-md-11 col-sm-11 col-xs-9"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<p class="__aboup">Talk2government is an application that helps to bridge the communication gap between the people and the leaders in government including political aspirants that want to become political office holders.</p>
				<p class="__aboup"> From mobile devices or computer systems, the voters and other people can easily know all the elected political office holders in Nigeria and all the political aspirants recognized by the electoral umpires, they can communicate with the elected leaders or with the aspirants and the leaders or aspirants can respond to the people based on one-on-one basis. Furthermore, people can donate to support their candidates.</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
			<img src="{{asset('css/assets/img/app1.png')}}" class="__appd">
			</div>
		</div>
		<div class="row mt-5p">
			<div class="col-lg-7 col-md-9 col-sm-10">
				<p class="__spaf">For sustainability & growth, support TALK2GOVERNMENT </p>
			</div>
			<div class="col-lg-5 col-md-3 col-sm-2">
				<p class="__spaf1" ><a href="/user/donate" class="__a">Donate</a></p>
			</div>
		</div>
	</div>
	<div class="__appabout">
		<div class="container">
			<div class="__appabou">
				<p>HOW IT WORKS</p>
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-3">
						<hr>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-9"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-1 col-md-1 col-sm-1"></div>
				<div class="col-lg-5 col-md-5 col-sm-5">
					<div class="__HOW">
						<i class="icon icon-user"></i>
						<p>For Voters & Others</p>
						<p><b>I.</b> Viewing Aspirants'  Profiles<br> 

						<b>Step 1</b> : To view aspirants' profiles ,click on TALK TO ASPIRANTS button on the homepage.<br> 

						Talk to Aspirants<br> 

						<b>Step 1</b> : Go to the menu and click on REGISTER menu to sign up on this platform.<br>
						<b>Step 2</b> : To view aspirants' profiles ,click on TALK TO ASPIRANTS button on the homepage.<br> 
						<b>Step 3</b> : Click on READ MORE under the picture of the aspirant you want to talk to and on the displayed page click on TALK TO ASPIRANT.<br>
						<b>Note :</b> You can send  messages and pictures to registered aspirants directly and aspirants can reply you accordingly.</p>
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-5">
					<div class="__HOW">
						<i class="icon icon-user"></i>
						<p>For Aspirants</p>
						<p><b>Step 1</b> : To view your profile as aspirant ,click on TALK TO ASPIRANTS button on the homepage. <br><b>Step 2</b> : To register as aspirant whose profile is existing on the platform or to register newly on the platform,click on click on TO REGISTER AS AN ASPIRANT OR CLAIM ACCOUNT,CLICK HERE button.<br><b>Step 3</b> : Fill the form and submit.</p>
					</div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1"></div>
				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="__appabou  mt-5p">
			<p>Contact</p>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-3">
					<hr>
				</div>
				<div class="col-md-11 col-sm-11 col-xs-9"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-7 col-sm-7">

				<div class="">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31707.36823328878!2d3.35549!3d6.594479000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c62e9888e949743!2sAfrican+Hub+International!5e0!3m2!1sen!2sng!4v1539269002621" class="__map"  frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-md-5 col-sm-5">
				<p style="font-size: 23px;font-weight: 600;">Request a call back.</p>
				<p><a class="__footera"><span><i class="fa fa-phone"></i></span> &nbsp;<span> +234 806 320 0000</span></a></p>
				<p><a href="mailto:info@raoatech.com" class="__footera"><span><i class="fa fa-envelope"></i></span> &nbsp;<span> info@raoatech.com</span></a></p>
				<form action="" method="POST" role="form" id="fileForm">
					<div class="form-group">
						<label for="" class="">Your Name</label>
						<input type="text" class="form-control" name="firstname" required />
					</div>
					<div class="form-group">
						<label for="" class="">Phone Number</label>
						<input type="text" class="form-control" placeholder="" name=""  required >
					</div>

					<div class="form-group">
						<label for="" class="">Email Address</label>
						<input type="email" class="form-control"  required />   
					</div>
					<div class="form-group">
						<label for="" class="">Message</label>
						<textarea name="" id="input" class="form-control" rows="4" required=""></textarea>
					</div>
					<button type="submit" class="btn btn-block __more">Send Message</button>
				</form>
			</div>
		</div>
	</div><br>
</section>
@endsection
	