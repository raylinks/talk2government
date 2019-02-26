<!DOCTYPE html>
<html>
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
                    <li>
                        <a class="sidenav-fold-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                        <a class="sidenav-expand-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>
                    <li class="search-box">
                        <a class="search-toggle" href="javascript:void(0);">
                            <i class="search-icon mdi mdi-magnify"></i>
                            <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                        </a>
                    </li>
                    <li class="search-input">
                        <input class="form-control" type="text" placeholder="Type to search...">
                        <div class="search-predict">
                            <div class="search-wrapper scrollable">
                                <div class="p-v-10">
                                        <span class="display-block m-v-5 p-h-20 text-gray">
                                            <i class="ti-file p-r-5"></i>
                                            <span>Files</span>
                                        </span>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="media-hover p-h-20">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-success">
                                                        <i class="mdi mdi-file-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Document.xls</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="media-hover p-h-20">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-info">
                                                        <i class="mdi mdi-file-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Mockup.doc</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="media-hover p-h-20">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-danger">
                                                        <i class="mdi mdi-file-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Document.pdf</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-h-20 border top"></div>
                            </div>
                            <div class="search-footer">
                                <span>You are Searching for '<b class="text-dark"><span class="serach-text-bind"></span></b>'</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        @include('admin.sidebar')
        <div class="page-container">
            <div class="quick-view">
                <ul class="quick-view-tabs nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#config" role="tab" data-toggle="tab">
                            <span>Config</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#quick-view-chat" role="tab" data-toggle="tab">
                            <span>Chat</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#activity" role="tab" data-toggle="tab">
                            <span>Activity</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content scrollable">
                    <!-- config START -->
                    <div id="config" role="tabpanel" class="tab-pane fade in active">
                        <div class="theme-configurator p-20">
                            <div class="m-v-20 border bottom">
                                <p class="text-dark text-semibold m-b-0">Solid Header</p>
                                <p class="m-b-15">Config header background (solid)</p>
                                <div class="theme-selector p-b-20">
                                    <label>
                                        <input type="radio" value="default" name="header-theme">
                                        <span class="theme-color bg-white border"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="primary" name="header-theme">
                                        <span class="theme-color bg-primary"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="info" name="header-theme">
                                        <span class="theme-color bg-info"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="success" name="header-theme">
                                        <span class="theme-color bg-success"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="warning" name="header-theme">
                                        <span class="theme-color bg-warning"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="danger" name="header-theme">
                                        <span class="theme-color bg-danger"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="dark" name="header-theme">
                                        <span class="theme-color bg-dark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-v-15 border bottom">
                                <p class="text-dark text-semibold m-b-0">Gradient Header</p>
                                <p class="m-b-15">Config header background (gradient)</p>
                                <div class="theme-selector p-b-15">
                                    <label>
                                        <input type="radio" value="primary-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-primary"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="info-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-info"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="success-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-success"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="warning-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-warning"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="danger-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-danger"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-v-15 border bottom">
                                <p class="text-dark text-semibold m-b-0">Side Nav Color</p>
                                <p class="m-b-15">Config side nav background</p>
                                <div class="theme-selector p-b-15">
                                    <label>
                                        <input type="radio" value="default" name="side-nav-color">
                                        <span class="theme-color bg-white border"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="dark" name="side-nav-color">
                                        <span class="theme-color bg-dark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-v-15">
                                <p class="text-dark text-semibold m-b-0">RTL</p>
                                <p class="m-b-15">Toggle right to left</p>
                                <div class="theme-selector p-b-15">
                                    <div class="switch checkbox-inline">
                                        <input type="checkbox" name="rtl-toogle" id="rtl-toogle">
                                        <label for="rtl-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="quick-view-chat" role="tabpanel" class="tab-pane fade">
                        <div class="quick-view-chat chat">
                            <div class="chat-user-list">
                                <div class="m-b-30 m-t-20">
                                    <h6 class="p-h-20 text-uppercase text-semibold">Online</h6>
                                    <ul class="list-media">
                                        <li class="list-item unread-msg">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    <span class="status success"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title">Marshall Nichols</span>
                                                    <span class="sub-title">Here's the story of a man...</span>
                                                    <div class="float-item">
                                                        <span class="chat-counter">2</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item unread-msg">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                    <span class="status success"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title">Susie Willis</span>
                                                    <span class="sub-title">Do you see any Teletubbies...</span>
                                                    <div class="float-item">
                                                        <span class="chat-counter">1</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                    <span class="status success"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title">Debra Stewart</span>
                                                    <span class="sub-title">Oh my God. I didn't even...</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-b-30">
                                    <h6 class="p-h-20 text-uppercase text-semibold">Away</h6>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Francisco Vasquez</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-5.jpg" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Jane Hunt</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Ava Alexander</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Shane Ross</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-b-30">
                                    <h6 class="p-h-20 text-uppercase text-semibold">Busy</h6>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                                    <span class="status busy"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Erin Gonzales</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                                    <span class="status busy"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Alan Mills</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="quick-view-conversation conversation">
                                <div class="conversation-wrapper">
                                    <div class="conversation-header">
                                        <span class="recipient">Susie Willis</span>
                                        <ul class="tools">
                                            <li>
                                                <a class="text-gray" href="javascript:void(0)">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-gray conversation-toggler" href="javascript:void(0)">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="quick-view-conversation-body conversation-body scrollable">
                                        <div class="msg datetime">
                                            <span>7:57PM</span>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Hey, what are you doing?</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Texting the most beautiful girl in the world.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Oh? How Cute</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Yup but she's not replying so texting you</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Okay</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg datetime">
                                            <span>8:05PM</span>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Bye</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>I'm just kidding..!!</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Hello</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>It's me..can you hear me..!!</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-footer">
                                        <button class="upload-btn">
                                            <i class="ti-face-smile"></i>
                                        </button>
                                        <input class="chat-input" type="text" placeholder="Type a message...">
                                        <button class="sent-btn">
                                            <i class="fa fa-send-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chat END -->
                    <!-- activity START -->
                    <div id="activity" role="tabpanel" class="tab-pane fade">
                        <div class="quick-view-activity">
                            <ul class="list-media m-t-20">
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Marshall Nichols</span>
                                            <span class="sub-title">has replied your mails.</span>
                                            <span class="sub-title font-size-11 p-t-5">8 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Susie Willis</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">12 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-primary">
                                                <i class="ti-settings"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">System Notifications</span>
                                            <span class="sub-title">Your account updated</span>
                                            <span class="sub-title font-size-11 p-t-5">2 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Erin Gonzales</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">3 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-info">
                                                <i class="mdi mdi-file-outline"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">New Attachment</span>
                                            <span class="sub-title">3 files has updated</span>
                                            <span class="sub-title font-size-11 p-t-5">5 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-success">
                                                <span>S</span>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">Suzanne Lynch</span>
                                            <span class="sub-title">has sent you a message.</span>
                                            <span class="sub-title font-size-11 p-t-5">9 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-12.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Riley Newman</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">10 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-warning">
                                                <span>FW</span>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">Franklin Weaver</span>
                                            <span class="sub-title">has sent you a message.</span>
                                            <span class="sub-title font-size-11 p-t-5">10 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-11.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Darryl Day</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">12 days ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit User</h4>
                                </div>

                                <div class="card-body">

                                    <form method="POST" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    @foreach ($errors as $error)
                                        <p class="alert alert-danger">{{$error}}</p>
                                    @endforeach
                                    <div id="tab1">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select name="title">
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Dr">Dr</option>
                                            <option value="Engr">Engr</option>
                                            <option value="GCFR">GCFR</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="firstname" required placeholder="First Name" value="{{ old('firstname') }}">
                                        @if ($errors->has('firstname'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="lastname" required placeholder="Last Name" value="{{ old('lastname') }}">
                                        @if ($errors->has('lastname'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" class="form-control" name="middlename" placeholder="middlename" value="{{ old('middlename') }}">
                                        @if ($errors->has('middlename'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label><span style="color:red">*</span>
                                        <input type="email" class="form-control"name="email" required value="{{ old('email') }}" placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                        <label>Background Details</label>
                                        <textarea rows="5" class="form-control" name="profile" placeholder="Here can be your description" value="{{ old('profile') }}"></textarea>
                                        @if ($errors->has('profile'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                        <label>Vision</label><span style="color:red">*</span>
                                        <textarea rows="5" required class="form-control" name="vision" placeholder="Enter Politician Vision here" value="{{ old('vision') }}"></textarea>
                                        @if ($errors->has('vision'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('vision') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                        <label>Mission</label><span style="color:red">*</span>
                                        <textarea rows="5" class="form-control" name="mission" required placeholder="Enter Politician mission here" value="{{ old('mission') }}"></textarea>
                                        @if ($errors->has('mission'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('mission') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                        <label>Manifestos</label><span style="color:red">*</span>
                                        <textarea rows="5" required class="form-control" name="manifesto" placeholder="Enter politician Manifesto" value="{{ old('manifesto') }}"></textarea>
                                        @if ($errors->has('manifesto'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('manifesto') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                    <a id="next2" class="btn btn-info btn-fill pull-right">NEXT</a>   
                                    </div>
                                    <div id="tab2">
                                        <div class="form-group" >
                                            <label>Position</label><span style="color:red">*</span>
                                            <select name="position_id"  id="position">
                                                <option value="0">All Positions</option>
                                                @foreach( $positions as $position)
                                                    <option value="{{ $position->id}}"> {{$position->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" style="display: none;" id="party-dis">
                                            <label>Party</label>
                                            <select name="party_id" id="party">
                                                <option value="0">All Parties</option>
                                                @foreach( $parties as $party)
                                                    <option value="{{ $party->id}}"> {{$party->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" style="display: none;" id="state-dis">
                                            <label>State</label>
                                            <select name="state_id" id="state">
                                                <option value="0">All States</option>
                                                @foreach( $states as $state)
                                                    <option value="{{ $state->id}}"> {{$state->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" style="display: none;" id="federalConst-dis">
                                            <label>Federal Constituency</label>
                                            <select name="federalConst_id" id="federalConst">
                                                <option value="0">All Federal Constituencies</option>
                                                @foreach( $federalConsts as $federalConst)
                                                    <option value="{{ $federalConst->id}}"> {{$federalConst->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" style="display: none;" id="lcda-dis">
                                            <label>LCDA</label>
                                            <select name="lcda_id" id="lcda">
                                                <option value="0">All LCDA</option>
                                                @foreach( $lcdas as $lcda)
                                                    <option value="{{ $lcda->id}}"> {{$lcda->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" style="display: none;" id="senatorialDist-dis">
                                            <label>Senatorial District</label>
                                            <select name="senatorialDist_id" id="senatorialDist">
                                                <option value="0">All Senatorial Districts</option>
                                                @foreach( $senatorialDistricts as $senatorialDistrict)
                                                    <option value="{{ $senatorialDistrict->id}}"> {{$senatorialDistrict->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <a id="next3" class="btn btn-info btn-fill pull-right">NEXT</a> 
                                    </div>
                                    <div id="tab3">
                                    <div class="form-group">
                                        <label>Password</label> <span style="color:red">*</span>
                                        <input type="password" class="form-control" required name="password" placeholder="Password" value="">
                                        @if ($errors->has('password'))
                                        <span class="alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label><span style="color:red">*</span>
                                        <input type="password" required class="form-control" name="password_confirmation" placeholder="Confirm Password" value="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file" name="picture" id="exampleInputFile">
                                    </div> 

                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="#" class="forgot-pass">Forgot password</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Setup Profile</button>
                                    </div>
                                    {{--<div class="d-flex">--}}
                                        {{--<button class="btn btn-facebook col mr-2">--}}
                                            {{--<i class="mdi mdi-facebook"></i> Facebook--}}
                                        {{--</button>--}}
                                        {{--<button class="btn btn-google col">--}}
                                            {{--<i class="mdi mdi-google-plus"></i> Google plus--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                    <!--<p class="sign-up text-center">Already have an Account?<a href="/auth/login"> Login</a></p>-->
                                    <!--<p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>-->
                                </div>
                                </form>


                                </div>

                                <!-- <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Susie Willis</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#33683</td>
                                    <td>05 May 2018</td>
                                    <td>$433.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Debra Stewart</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#33668</td>
                                    <td>09 May 2018</td>
                                    <td>$2488.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Erin Gonzales</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#33684</td>
                                    <td>16 May 2018</td>
                                    <td>$762.00</td>
                                </tr> -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Connect</h4>
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
                            <ul class="list-media m-b-20">
                                <li class="list-item">
                                    <div class="p-v-15 p-h-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title p-t-10 text-semibold">Susie Willis</span>
                                            <div class="float-item">
                                                <button class="btn btn-default btn-rounded m-b-0">Follow</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="p-v-15 p-h-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title p-t-10 text-semibold">Debra Stewart</span>
                                            <div class="float-item">
                                                <button class="btn btn-default btn-rounded m-b-0">Follow</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="p-v-15 p-h-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title p-t-10 text-semibold">Erin Gonzales</span>
                                            <div class="float-item">
                                                <button class="btn btn-default btn-rounded m-b-0">Follow</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="p-v-15 p-h-20">
                                        <div class="media-img">
                                            <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title p-t-10 text-semibold">Ava Alexander</span>
                                            <div class="float-item">
                                                <button class="btn btn-default btn-rounded m-b-0">Follow</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <span>Your Earning</span>
                                    <span class="d-block text-gray font-size-13 m-t-10">Jan 7 - Mar 8 </span>
                                </h4>
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
                            <div class="card-body">
                                <h2 class="font-weight-light font-size-28">$1,689.73</h2>
                                <p><span class="text-info text-semibold font-size-15">1.5%</span> services charge per sales</p>

                            </div>
                            <div class="m-t-45">
                                    <canvas class="chart" id="earning-chart" style="height: 100px"></canvas>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upcoming Event</h4>
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
                            <div class="card-body p-t-15">
                                <ul class="list-unstyled">
                                    <li class="p-v-15 border bottom">
                                        <a href="#">
                                            <div class="media">
                                                <div class="m-r-20">
                                                    <img class="img-fluid" src="assets/images/others/img-35.jpg" alt="">
                                                </div>
                                                <div >
                                                    <h5 class="text-link text-semibold m-b-0 m-t-5">Team Gathering</h5>
                                                    <p class="text-semibold font-size-13">MAY 11, 2018</p>
                                                    <p class="font-size-13">Efficiently unleash information </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="p-v-15">
                                        <a href="#">
                                            <div class="media">
                                                <div class="m-r-20">
                                                    <img class="img-fluid" src="assets/images/others/img-34.jpg" alt="">
                                                </div>
                                                <div >
                                                    <h5 class="text-link text-semibold m-b-0 m-t-5">Video Conference</h5>
                                                    <p class="text-semibold font-size-13">MAY 18, 2018</p>
                                                    <p class="font-size-13">Efficiently unleash information </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- Content Wrapper END -->

        <!-- Footer START -->
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
        <!-- Footer END -->

    </div>
    <!-- Page Container END -->

</div>
</div>

<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{!! asset('css/admincss/js/vendor.js')!!}"></script>

<script src="{!!asset ('css/admincss/js/app.min.js')!!}"></script>

<!-- page js -->
<script src="{!!asset('css/admincss/vendor/chart.js/dist/Chart.min.js')!!}"></script>
<script src="{!!asset ('css/admincss/vendor/jquery.sparkline/jquery.sparkline.min.js')!!}"></script>
<script src="{!!asset ('css/admincss/js/dashboard/default.js')!!}"></script>
        <script>
                $('#tab1').show();
                $('#tab2').hide();
                $('#tab3').hide();
                
                $('#next2').click(function(){
                    $('#tab1').hide();
                    $('#tab2').show();
                    $('#tab3').hide();
                });
                $('#next3').click(function(){
                    $('#tab1').hide();
                    $('#tab2').hide();
                    $('#tab3').show();
                });

                $('select#position').change(function () {
                     var pos = $('select#position').val()
                        // alert(pos)
                    if(pos == 1){
                        $('#lcda-dis').hide()
                        $('#state-dis').hide()
                        $('#federalConst-dis').hide()
                        $('#senatorialDist-dis').hide()
                        $('#party-dis').show()
                    }
                    else if(pos == 2)
                    {
                        $('#lcda-dis').hide()
                        $('#federalConst-dis').hide()
                        $('#senatorialDist-dis').hide()
                        $('#state-dis').show()
                        $('#party-dis').show()

                    }
                    else if(pos == 3)
                    {
                        $('#federalConst-dis').hide()
                        $('#lcda-dis').hide()
                        $('#state-dis').show()
                        $('#senatorialDist-dis').show()
                        $('#party-dis').show()

                    }
                    else if(pos == 4)
                    {
                        $('#senatorialDist-dis').hide()
                        $('#lcda-dis').hide()
                        $('#state-dis').show()
                        $('#federalConst-dis').show()
                        $('#party-dis').show()

                    }
                    else if(pos == 5)
                    {
                        $('#federalConst-dis').hide()
                        $('#senatorialDist-dis').hide()
                        $('#state-dis').show()
                        $('#lcda-dis').show()
                        $('#party-dis').show()

                    }
                    else if(pos == 6)
                    {
                        $('#federalConst-dis').hide()
                        $('#senatorialDist-dis').hide()
                        $('#state-dis').show()
                        $('#lcda-dis').show()
                        $('#party-dis').show()
                    }





                    // alert(t)
                    // $('#position').show();
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
</body>


<!-- Mirrored from themenate.com/applicator/dist/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Oct 2018 11:01:44 GMT -->
</html>