<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Applicator - Admin Dashboard Template</title>
    <link rel="apple-touch-icon" href="/admincss/images/logo/apple-touch-icon.html">
    <link rel="shortcut icon" href="/admincss/images/logo/favicon.png">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/bootstrap/dist/css/bootstrap.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/PACE/themes/blue/pace-theme-minimal.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')!!}" />
    <link href="{!!asset('css/admincss/css/font-awesome.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/themify-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/materialdesignicons.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/animate.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/app.css')!!}" rel="stylesheet">
</head>

<body>

@yield('content')

<script src="{!! asset('css/admincss/js/vendor.js')!!}"></script>

<script src="{!!asset ('css/admincss/js/app.min.js')!!}"></script>
<script src="{!!asset('css/admincss/vendor/chart.js/dist/Chart.min.js')!!}"></script>
<script src="{!!asset ('css/admincss/vendor/jquery.sparkline/jquery.sparkline.min.js')!!}"></script>
<script src="{!!asset ('css/admincss/js/dashboard/default.js')!!}"></script><script src="{{ asset('js/toastr.min.js') }}"></script>
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
</html>