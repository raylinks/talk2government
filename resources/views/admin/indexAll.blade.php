<!DOCTYPE html>
<html>


<!-- Mirrored from themenate.com/applicator/dist/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Oct 2018 10:59:08 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Applicator - Admin Dashboard Template</title>
    <link rel="apple-touch-icon" href="/admincss/images/logo/apple-touch-icon.html">
    <link rel="shortcut icon" href="/admincss/images/logo/favicon.png">
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/bootstrap/dist/css/bootstrap.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/PACE/themes/blue/pace-theme-minimal.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')!!}" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/font-awesome.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/themify-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/materialdesignicons.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/animate.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/app.css')!!}" rel="stylesheet">
</head>
<body>
<div class="app header-default side-nav-dark">
    <div class="layout">
        <div class="header navbar">
            <div class="header-container">
                <div class="nav-logo">
                    <a href="index-2.html">
                        <div class="logo logo-dark" style="background-image: url('assets/images/logo/logo.png')"></div>
                        <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
                    </a>
                </div>
                <ul class="nav-left">

                </ul>
                <ul class="nav-right">
                    <li class="dropdown dropdown-animated scale-left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-apps"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-grid col-3 dropdown-lg">
                            <li>
                                <a href="/admin/logout">
                                    <div class="text-center">
                                        <i class="mdi mdi mdi-gauge font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Logout</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        @include('admin.sidebar')
        <div class="page-container">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Politicians</h4>
                                    <div class="card-toolbar">
                                        <ul>
                                            <li>
                                                <a class="text-gray" href="javascript:void(0)">
                                                    <i class="mdi mdi-dots-vertical font-size-20"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-overflow">
                                    <table class="table table-lg">
                                        <thead>
                                        <tr>
                                            <td class="text-dark text-semibold">ID</td>
                                            <td class="text-dark text-semibold">States</td>
                                            <td class="text-dark text-semibold">L/Govt</td>
                                            <td class="text-dark text-semibold">Sen/District</td>
                                            <td class="text-dark text-semibold">Constituency</td>
                                            <td class="text-dark text-semibold">ACTIONS</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($politicians as $politician)
                                            <tr>
                                                <td>
                                                    {{$id++}}
                                                </td>
                                                <td>{{$politician->userDetail->lastname}} {{$politician->userDetail->firstname}}</td>
                                                <td>{{$politician->userDetail->email}}</td>
                                                <td>{{$politician->userDetail->email}}</td>
                                                <td>{{$politician->userDetail->email}}</td>

                                                <td>





                                                    <a  href="{{route('admin.user.edit',$politician->id)}}" class="btn btn-xs btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
                                                    <a  href="/admin/user/delete" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="content-footer">
                <div class="footer">
                    <div class="copyright">
                        <span>Copyright © 2018 <b class="text-dark">Theme_Nate</b>. All rights reserved.</span>
                        <span class="go-right">
                                <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
                                <a href="#" class="text-gray">Privacy &amp; Policy</a>
                            </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="{!! asset('css/admincss/js/vendor.js')!!}"></script>
<script src="{!!asset ('css/admincss/js/app.min.js')!!}"></script>
<script src="{!!asset('css/admincss/vendor/chart.js/dist/Chart.min.js')!!}"></script>
<script src="{!!asset ('css/admincss/vendor/jquery.sparkline/jquery.sparkline.min.js')!!}"></script>
<script src="{!!asset ('css/admincss/js/dashboard/default.js')!!}"></script>
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


<!-- Mirrored from themenate.com/applicator/dist/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Oct 2018 11:01:44 GMT -->
</html>