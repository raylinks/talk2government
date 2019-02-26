<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('css/assets/img/favicon.png')}}">
	<title>Talk2government</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/libraries/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{!!asset('css/assets/css/main.css')!!}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/assets/css/index.css')}}">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	@yield('more_css')
</head>
<body class="">
	@yield('header')
	@yield('content')
	<footer>
		<div class="__foter">
			<p class="text-center"><a href="http://www.raoatech.com" target="_blank"> Powered by Raoatech</a></p>
		</div>
	</footer> 
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
@yield('more_js')
</body>
</html>