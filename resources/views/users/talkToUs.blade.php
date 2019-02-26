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
                    <div class="col-lg-3 col-md-3 col-sm-3"></div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-card">
                            <div class="main text-center">
                                <h2>REACH OUT TO {{$politician->userDetail->title}} {{$politician->userDetail->lastname}} {{$politician->userDetail->firstname}}</h2>
                            </div>
                            <br>
                            <div class="row">
                                <form enctype="multipart/form-data" method="post">
                                    @csrf
                                    <p>{{ $user->EndUserDetail->fullname }}</p>
    
                                    <p>{{ $user->EndUserDetail->email }}</p>
    
                                    <div class="form-group">
                                        <textarea name="message" required id="input" class="form-control" rows="5" placeholder="Message"></textarea>
                                    </div>
    
                                    <p>Attach Document</p>
    
                                    <div class="form-group">
                                            <input type="file" class="form-control" name="picture" id="exampleInputFile">
                                    </div>
    
                                    <button type="submit" class="btn btn-submit-blue pull-right">Talk</button>
    
                                </form>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3"></div>
                  </div>
            </div>
         </section>
@endsection

