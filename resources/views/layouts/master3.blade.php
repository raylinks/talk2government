<!DOCTYPE html>
<html class="html">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <title> Talk2Gov </title>
    <link rel="stylesheet" href="{{asset('talkCss/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('talkCss/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('talkCss/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('talkCss/css/responsive.css')}}">
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="{{asset('/img/talk2govv.jpg')}}" class="logo logo-scrolled" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">

            </div>
        </div>
    </nav>
    <div class="clearfix"></div>
</header>
@yield('content')
<!--<section id="news-letter">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-1 col-sm-1 col-xs-12">-->
<!--                <div class="email-icon">-->
<!--                    <i class="fa fa-envelope-square" aria-hidden="true"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-5 col-sm-5 col-xs-12">-->
<!--                <p>-->
<!--                    Subscribe to our newsletter.-->
<!--                </p>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                <div class="subscribe-form">-->
<!--                    <input name="email" type="text" placeholder="Enter email id">-->
<!--                    <button class="subscribe-button" type="submit">subscribe</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<footer>
    <div class="footer-btm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copywrite">
                        <p>© <a href="http://www.raoatech.com">Raoatech IT Electromech </a> 2018 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
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
            success: function(response) {
                if(response.data.status == 'error'){
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
</body>
</html>
