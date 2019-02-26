@if(Auth::user()->is_active == 0)
<style>
    .shadow {
-webkit-border-radius: 0% 0% 100% 100% / 0% 0% 8px 8px;
-webkit-box-shadow: rgba(0, 0, 0,.30) 0 2px 3px;
}
.container {
  margin: 0 auto;
  margin-top: 50px;;

  height: 80vh;
  background: #F2F2F2;
  border: 1px solid #ccc;
  box-shadow: 1px 1px 2px #fff inset,
              -1px -1px 2px #fff inset;
  border-radius: 3px/6px;         
    
    
}
</style>
<div class="shadow">
  <div class="container">
  <a href="/auth/logout" >Back</a>
  <p style="color: #0D3349;margin:0 auto;text-align: center;margin-top: 300px;font-size: 50px;font-weight: bold;">User Profile not active yet. Kindly contact admin on 08097227051. Thanks for your patience!!</p>
  
    <!--<script>-->
    <!--    window.location = ' /auth/logout';-->
    <!--</script>-->
  
  </div>
</div>

    

@else
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/dataTables.bootstrap.css">
        <link href="/css/animate.min.css" rel="stylesheet"/>
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="/css/AdminLTE.min.css">
        <link href="/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
        <link rel="SHORTCUT ICON" HREF="/img/talk2govv.jpg">
        <link href="/css/demo.css" rel="stylesheet" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="/css/pe-icon-7-stroke.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            @include('shared.sidebar')
            <div class="main-panel">
                @include('shared.navbar')  
                @yield('content')
                @include('shared.footer')
            </div>
        </div>
    </body>
    <script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script src="/js/Chart.min.js"></script>
    <script src="/js/bootstrap-notify.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/bootstrap-timepicker.min.js"></script>
    <script src="/js/bootstrap3-wysihtml5.all.min.js"></script>
    @yield('more_js')
    <script>
    $(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
    });
    </script>
    <script>
    $(function(){
        $('#success').fadeOut(3500);
    });
    </script>
    <script src="/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome to <b>SenateApp</b> - a beautiful software for every Politician."

            }, {
                type: 'info',
                timer: 4000
            });
        });
    </script>
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
</html>
@endif