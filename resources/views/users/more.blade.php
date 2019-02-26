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
</header><br>
@endsection
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				@if($user->is_active ==  1)
				<div>
					<img src="{{asset('images/politicians/'.$user->userDetail->picture)}}" class="img-responsive" style="width: 50%; height: 300px;"><br>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<p class="__morep">Name :</p>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-9">
								<p class="pull-right">
									@if($user->userDetail->sub_code != null)
									<a  href='{{route('user.pay', $user->id)}}' class="btn __viewbtn" style="background: #388e3c;">Donate</a>
									@endif
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="{{route('user.talkToUs',$user->id)}}" class="btn __viewbtn">Talk to {{ $user->userDetail->lastname}}</a>
								</p>
							<p>{{ $user->userDetail->title}} {{ $user->userDetail->lastname}} {{ $user->userDetail->firstname}}</p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-4">
							<p class="__morep">Profile :</p>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-8">
							<p>{{ $user->userDetail->profile}}</p>
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-4">
							<p class="__morep">Party :</p>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-8">
						<p>{{ $user->userDetail->party->name }}</p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-4">
							<p class="__morep">Position :</p>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-8">
							<p>{{ $user->userDetail->position->name }}</p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-5">
							<p class="__morep">Manifesto :</p>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-7">
							@if($manifestos == null)
								<p> Manifestos not available for now. </p>
							@else
								<p>{{ $manifestos->content}}</p>
							@endif
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-4">
							<p class="__morep">Vision :</p>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-8">
							@if($vision == null)
								<p> Vision not available for now. </p>
							@else
								<p>{{ $vision->content}}</p>
							@endif
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<p class="__morep">Achivement :</p>
						</div>
							@if($achievements == null)
									<p> No achievement available.</p>
							@else 
							@foreach($achievements as $achievement)
								{{$iid++}}
								<div class="col-md-9 col-sm-9">
									<div class="__achive">
										<img src="{{asset('images/'. $achievement->picture)}}" style="width:30%; height:90px;">
									<p> {{$achievement->content}}</p>
									</div>
								</div>
							@endforeach
							@endif</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<p class="__morep">Campign Schedule :</p>
						</div>
						<div class="col-md-9 col-sm-9">
							<table class="table table-responsive table-inverse">
								<thead>
									<tr>
										<th>Location</th>
										<th>Date</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									@foreach( $campaign as $campaign)
										<tr>
											<td>{{$id2++}}</td>
											<td>{{ $campaign->location }}</td>
											<td>{{ $campaign->date }}</td>
											<td>{{ $campaign->time }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-3">
				<p><b>facebook posts and comments</b></p>
				<iframe src="{{$user->userDetail->facebook}}" width="100%" height="600" frameborder="0"></iframe>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3">
				<p><b>twitter posts and comments</b></p>
				<iframe src="{{$user->userDetail->twitter}}" width="100%" height="600" frameborder="0"></iframe>
			</div>
		</div>
	</div>
	@else
	<div class="text-center">
		<br>	<br>	<br>	<br>	<br>	<br>	<br>
		User account not activated yet user detail cannot be accessed at the moment
	</div>
@endif
</section>
@endsection
