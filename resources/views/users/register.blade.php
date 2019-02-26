@extends('layouts.Usermaster')
@section('header')
<header>
		<nav class="navbar navbar-default __navbackground" role="navigation">
			<div class="container">
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
							<li><a href="/user/index" class="__navfonta">Home</a></li>
							<li><a href="/user/index" class="__navfont">News & Events</a></li>
							<li><a href="/user/donate" class="__navfont">Donate</a></li>
							<li><a href="/user/login" class="__navfont"></i> Login</a></li>
							<li><a href="/user/register" class="__navfont">Register</a></li>
						
					</ul>
				</div>
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
						<center><span style="font-size: 30px;">Register</span></center>
						<br>
						<div class="row">
								<form method="post">
										@csrf
										<div class="form-group">
												<input type="text" class="form-control" required value="{{ old('fullname') }}" name="fullname" placeholder="Full Name">
												@if($errors->has('fullname'))
												<p class="alert alert-danger">
													<span>{{ $errors->first('fullname') }}</span>
												</p>
												@endif
											</div>
											<div class="form-group">
												<input type="email" class="form-control" required value="{{ old('email') }}" name="email" placeholder="Email">
												@if($errors->has('email'))
													<p class="alert alert-danger">
														<span>{{ $errors->first('email') }}</span>
													</p>
												@endif
											</div>
											<div class="form-group">
												<input type="number" required class="form-control" value="{{ old('phone') }}"
													   name="phone" placeholder="Phone Number">
												@if($errors->has('phone'))
													<p class="alert alert-danger">
														<span>{{ $errors->first('phone') }}</span>
													</p>
												@endif
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<select name="state_id" id="input" class="form-control">
															<option value="0">State of origin</option>
															@foreach($states as $state)
																<option value="{{ $state->id }}">{{$state->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<select name="state_lga" id="input" class="form-control">
															<option value="0">Local Goverment</option>
															@foreach($lcdas as $lcda)
																<option value="{{ $lcda->id }}">{{$lcda->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<select name="residence_id" id="input" class="form-control">
															<option value="0">State of Residence</option>
															@foreach($states as $state)
																<option value="{{ $state->id }}">{{$state->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<select name="residence_lga" id="input" class="form-control">
															<option value="0">Local Goverment</option>
															@foreach($lcdas as $lcda)
																<option value="{{ $lcda->id }}">{{$lcda->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<select name="gender" id="input" class="form-control">
													<option value="">Select Gender</option>
													<option value="male">Male</option>
													<option value="female">Female</option>
												</select>
											</div>
											<div class="form-group">
												<input type="password" name="password" required class="form-control" id="" placeholder="Password">
												@if($errors->has('password'))
													<p class="alert alert-danger">
														<span>{{ $errors->first('password') }}</span>
													</p>
												@endif
											</div>
											<div class="form-group">
												<input type="password" required name="password_confirmation" class="form-control" id="" placeholder="Re-enter Password">
											</div>
											<button type="submit" class="btn btn-submit-blue pull-right">Register</button>
										<div class="">
											<ul  class="form-card-links list-inline">
											<li><a href="/user/login">Already have an Account</a></li>
											</ul>
										</div>
									</form>
						</div>
					</div>
  				</div>
  				<div class="col-lg-4 col-md-4 col-sm-3"></div>
  			</div>
		</div>
</section>
@endsection