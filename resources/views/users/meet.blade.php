 @extends('layouts.Usermaster')
 @section('more_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="{{asset('talkCss/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/responsive.css')}}">
 @endsection
 @section('more_js')
 <script src="{{asset('css/plum/plugins.js')}}"></script>
 <script src="{{asset('css/plum/bootstrap.min.js')}}"></script>
 <script src="{{asset('css/plum/slider.js')}}"></script>
 <script src="{{asset('css/plum/theme.js')}}"></script>
 <script src="{{asset('css/plum/wow.js')}}"></script>
 <script src="{{asset('css/plum/jquery.fancybox.pack.js')}}"></script>
 <script src="{{asset('css/plum/jquery.mixitup.min.js')}}"></script>
 <script src="{{asset('css/plum/isotope.js')}}"></script>
 <script src="{{asset('css/plum/gallery.js')}}"></script>
 <script>
	 @if(Session::has('success'))
	 toastr.success("{{ Session::get('success') }}")

	 @elseif(Session::has('error'))
	 toastr.error("{{ Session::get('error') }}")

	 @elseif(Session::has('info'))
	 toastr.info("{{ Session::get('info') }}")

	 @endif
</script>
 <script type="text/javascript">
	 $(function() 
	 {
		 $('select#aspirant').change(function()
		 {
			 var aspirant = $('select#aspirant').val();
			 if(aspirant == 'president')
			 {
				 $('#lcda-dis').hide()
				 $('#fed-dis').hide()
				 $('#party-dis').show()
				 $('#sen-dis').hide()
				 $('#state-dis').hide()
				 $('#category').hide()
			 }

			 if(aspirant == 'state')
			 {
				 $('#lcda-dis').hide()
				 $('#fed-dis').hide()
				 $('#party-dis').show()
				 $('#sen-dis').hide()
				 $('#state-dis').show()
			 }
		 });
		 $('select#state').change(function()
		 {
			 $('#category').show()
			 $('#cat-dis').show()
			 var state = $('select#state').val();
			 var url = '/user/fetchDetails/'+ state;
			 $.ajax({
				 type: "GET",
				 url: url,
				 success: function(data) {
					 // console.log(data)
					 // console.log(data.success.sens)
					 // console.log(data.success.feds)
					 // console.log(data.success.lcdas)
					 // console.log(data.success.parties)

					 var lcdas = data.success.lcdas
					 var feds = data.success.feds
					 var sens = data.success.sens
					 var parties = data.success.parties

					 var lcda_d = "";
					 var fed_d = "";
					 var sen_d = "";
					 var party_d = "";

					 lcda_d += (`<option value="">`+ 'Select LGA' +`</option>`);
					 fed_d += (`<option value="">`+ 'Select Federal Constituency' +`</option>`);
					 sen_d += (`<option value="">`+ 'Select Senatorial District' +`</option>`);
					 party_d += (`<option value="">`+ 'Select Party' +`</option>`);

					 $.each(lcdas, function (key, val) {
						 lcda_d += (`<option value="${val.id}">`+ val.name+`</option>`);
					 });
					 $.each(feds, function (key, val) {
						 fed_d += (`<option value="${val.id}">`+ val.name+`</option>`);
					 });
					 $.each(sens, function (key, val) {
						 sen_d += (`<option value="${val.id}">`+ val.name+`</option>`);
					 });
					 $.each(parties, function (key, val) {
						 party_d += (`<option value="${val.id}">`+ val.name+`</option>`);
					 });
					 
					 $('#lcda-data').html(' ');
					 $('#sen-data').html(' ');
					 $('#fed-data').html(' ');
					 $('#party-data').html(' ');

					 $('#lcda-data').append(lcda_d);
					 $('#sen-data').append(sen_d);
					 $('#fed-data').append(fed_d);
					 $('#party-data').append(party_d);
				 },
				 dataType: 'JSON'
			 });
		 })
	 });

	 $('select#category').change(function()
	 {
			 var cat = $('select#category').val()
			 if(cat == 1)
			 {
				 $('#lcda-dis').hide()
				 $('#fed-dis').hide()
				 $('#party-dis').hide()
				 $('#sen-dis').show()
			 }
			 if(cat == 2)
			 {
				 $('#lcda-dis').hide()
				 $('#party-dis').hide()
				 $('#sen-dis').hide()
				 $('#fed-dis').show()
			 }
			 if(cat == 3)
			 {
				 $('#lcda-dis').hide()
				 $('#sen-dis').hide()
				 $('#fed-dis').hide()
				 $('#party-dis').hide()
			 }
	 });
 </script>
 @endsection
 @section('content')
 <section>
	<div class="container">
		<h1 class="__meet-aspirant">Meet and talk to Aspirants</h1><br><br>
		<div class="text-center">
			<button type="submit"  class="btn btn-info btn-fill pull-right"><a href="/user/message"> To Register as an aspirant or claim accout, click here</a></button>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-1"></div>
			<div class="col-md-8 col-sm-10">
				<div class="row">
				<form method="post">
					@csrf
					<div class="col-md-3 col-sm-3">
							<select name="aspirant_id"  id="aspirant" class="form-control">
									<option value="">Select Option</option>
									<option value="president">President</option>
									<option value="state">State</option>
								</select>
							<div class="form-group" style="display:none" id="state-dis">
								<label>State</label>
									<select name="state_id" id="state"  class="form-control">
										<option value="0">All States</option>
										@foreach( $states as $state)
										<option value="{{ $state->id}}"> {{$state->name}} </option>
										@endforeach
									</select>
								</div>

								<div class="form-group" style="display:none" id="cat-dis">
										<select name="category" id="category" class="form-control">
												<label>Select Category</label>
												<option value="">All Categories</option>
												<option value="1">Senatorial District</option>
												<option value="2">Federal Constituency</option>
												<option value="3">Governor</option>
												<option value="4">State Assembly</option>
										</select>
								</div>

								<div class="form-group" id="lcda-dis" style="display: none">
										<select id="lcda-data" class="form-control"></select>
								</div>

								<div class="form-group" id="fed-dis" style="display: none">
										<select id="fed-data" name="fed_id" class="form-control"></select>
								</div>

								<div class="form-group" id="sen-dis" style="display: none">
										<select id="sen-data" name="sen_id" class="form-control"></select>
								</div>

								<div class="form-group" id="party-dis" style="display: none">
										<select id="party-data" name="party_id" class="form-control">
											<option value="">Select Party</option>
											@foreach( $parties as $party)
										<option value="{{ $party->id}}">{{ $party->name}}</option>
											@endforeach
										</select>
							</div>
					</div>
					<button type="submit" name="submit" value="search">Search</button>
				</div>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div><br>

		<div class="row">
			@foreach ( $politicians as $politician)
				@if($politician->user_id == null)
			<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="__partycard">
						<a href="#"><div class="__{{$politician->userDetail->party->name}}">
							<img src="{{asset('/images/politicians/'.$politician->userDetail->picture)}}" class="img-responsive" style="width: 100%; height: 300px;">
							<div class="__overlay">
								<p><sapn><img src="{{asset('css/assets/img/parties/'.$politician->userDetail->party->name.'.jpg')}}" class=""></sapn>&nbsp;{{$politician->userDetail->party->name}}</p>
							</div>
						</div>
						</a>
						<div class="__cardin">
						<h3>{{$politician->userDetail->title}} {{$politician->userDetail->lastname}} {{$politician->userDetail->firstname}}</h3>
							{{-- <p> {{$politician->userDetail->profile}} </p>
							@if($politician->id == null)
							
							@else --}}
							<p><a href="{{route('politician.details', $politician->id)}}" class="__rmore">Read More&nbsp;<span><i class="icon icon-arrow-right"></i></span></a></p>
							{{-- @endif --}}
						</div>
					</div>
			</div>
				@else
				<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="__partycard">
							<a href="#"><div class="__{{$politician->party->name}}">
								<img src="{{asset('/images/politicians/'.$politician->picture)}}" class="img-responsive" style="width: 100%; height: 300px;">
								<div class="__overlay">
									<p><sapn><img src="{{asset('css/assets/img/parties/'.$politician->party->name.'.jpg')}}" class=""></sapn>&nbsp;{{$politician->party->name}}</p>
								</div>
							</div>
							</a>
							<div class="__cardin">
							<h3>{{$politician->title}} {{$politician->lastname}} {{$politician->firstname}}</h3>
								{{-- <p> {{$politician->profile}} </p> --}}
								{{-- @if($politician->id == null)
								
								@else --}}
								<p><a href="{{route('politician.details', $politician->user_id)}}" class="__rmore">Read More&nbsp;<span><i class="icon icon-arrow-right"></i></span></a></p>
								{{-- @endif --}}
							</div>
						</div>
				</div>
				@endif
			
			@endforeach
		</div>
		<br>
		{{ $politicians->links()}}
	</div>
	<br>
	
	<section id="news-letter">
			<div class="container">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<div class="email-icon">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 col-xs-12">
						<p>
							Subscribe to our newsletter.
						</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="subscribe-form">
						@csrf
							<input name="email" type="text" placeholder="Enter email address">
							<button class="subscribe-button" value="newsletter" name="submit" type="submit">subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
	</section>
</section>
 @endsection
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
	
			<!-- Collect the nav links, forms, and other content for toggling -->
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