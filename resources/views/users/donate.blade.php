@extends('layouts.Usermaster')
@section('more_css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('more_js')
<script>
        function payWithPaystack(){
            var name = $('#name').val();
            var email = $('#email').val();
            var amount = $('#amount').val();
            amount = amount * 100;
            var handler = PaystackPop.setup({
                key: 'pk_live_16860dd8d429b5f707b8fa6d12f94472ae060516',
                subaccount: 'ACCT_kwwbi4fv82qq1p3',
                bearer:'subaccount',
                email: email,
                amount: amount,
                // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                name: name,
                metadata: {
                    custom_fields: [
                        {
                            // display_name: "Mobile Number",
                            // variable_name: "mobile_number",
                            // value: phone
                        }
                    ]
                },
                callback: function(response){
                    afterResponse(response.reference)
                },
                onClose: function(){
    
                }
            });
            handler.openIframe();
        }
    
        function afterResponse(reference){
            var url = 'https://api.paystack.co/transaction/verify/'+reference;
            var key = 'Bearer sk_live_9e5ada2a153056a89a277e36573953b91116551e';
            $.ajax({
                url: url,
                headers: {
                    Authorization: key
                },
                data: {
                    format: 'json'
                },
                error: function(data) {
                    console.log(data);
                },
                dataType: 'json',
                success: function(response)
                {
                    if(response.data.status == 'error')
                    {
                        alert('Error making payment.kidly try again!!')
                        window.location.href =  window.location.origin+'/user/login';
                    }
                    saveFeedback(response.data.reference,response.data.status,response.data.transaction_date)
                },
                beforeSend: function(){
                    $('#whole').hide();
                    $('.loader').show();
                },
                complete: function(data)
                {
    
                },
                type: 'GET'
            });
        }
    
        function saveFeedback(reference, status, time)
        {
            var url = '/user/donate/save';
            var token = $('meta[name="csrf-token"]').attr('content')
            var name = $('#name').val();
            var email = $('#email').val();
            var amount = $('#amount').val();
            var data = {
                "_method": 'POST',
                "_token": token,
                transact_id: reference,
                status: status,
                name:name,
                amount:amount,
                email:email
                
            }
            console.log(data);
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(data) {
                    alert('Payment made successfully')
                    window.location.href =  window.location.origin+'/';
                },
                dataType: 'JSON'
            });
        }
    </script>
@endsection
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
</header>
<br>
@endsection
@section('content')
<section>
	<div class="container">
        <div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3"></div>
  				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="form-card">
						<div class="row">
							<center><span style="font-size: 30px;">Donate</span></center>
                            <br>
								<div class="form-group">
									<input type="text" class="form-control" required id="name"  name="name" placeholder="Full Name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" required id="email" name="email" placeholder="Email address">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="amount" id="amount"  required placeholder="Amount">
                                </div>
                                <form>
                                        <script src="https://js.paystack.co/v1/inline.js"></script>
                                        <button type="button" class="btn btn-submit-blue pull-right" onclick="payWithPaystack()"> Pay Now</button>          
                                </form>
						</div>
					</div>
  				</div>
  				<div class="col-lg-4 col-md-4 col-sm-3"></div>
  			</div>
        </div>
	</section>

    {{-- <div class="container inner-container">
        <div class="section-title text-center">
            <h1>DONATE</h1>
            <p class="wd-50">
            </p>
        </div>

        <div class="contact-form-container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12 pull-right">
                        <p>Full name <span style="color:red">*</span><input type="text" required id="name"  name="name" placeholder="Name"></p>
                        <p>Email <span style="color:red">*</span><input type="text" required id="email" name="email" required placeholder="Email"></p>
                        <p>Amount <span style="color:red">*</span><input type="text" name="amount" id="amount"  required placeholder="Amount"></p>

                        <form>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button type="button" class="theme-btn btn-lg" onclick="payWithPaystack()"> Pay Now</button>          
    </form>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="tt-contact">
                        <div class="tt-contact-icon-outer">
                            <div class="tt-contact-icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="tt-contact-info">
                            <div class="simple-text">
                                <p>
                                    No 4, Sule abuka street off GT bank<br>
                                    Opebi Allen Lagos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="tt-contact">
                        <div class="tt-contact-icon-outer">
                            <div class="tt-contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div class="tt-contact-info">
                            <div class="simple-text">
                                <p>
                                    +234 806 320 0000
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="tt-contact">
                        <div class="tt-contact-icon-outer">
                            <div class="tt-contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                        <div class="tt-contact-info">
                            <div class="simple-text">
                                <p>
                                    info@raoatech.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection