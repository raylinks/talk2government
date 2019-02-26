@if(!isset(Auth::user()->id))
<script>
    window.location.href = '/user/login';
</script>
@else 


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Talk2Gov</title>
    <link rel="apple-touch-icon" href="/admincss/images/logo/apple-touch-icon.html">
    <link rel="shortcut icon" href="/admincss/images/logo/favicon.png">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/bootstrap/dist/css/bootstrap.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/PACE/themes/blue/pace-theme-minimal.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/admincss/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')!!}" />
    <link href="{!!asset('css/admincss/css/font-awesome.min.css')!!}" rel="stylesheet">
    <link rel="SHORTCUT ICON" HREF="/img/talk2govv.jpg">
    <link href="{!!asset('css/admincss/css/themify-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/materialdesignicons.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/animate.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('css/admincss/css/app.css')!!}" rel="stylesheet">
</head>

<body>
    <div class="app header-default side-nav-dark">
        {{-- <div class="layout">
            <div class="header navbar">
                <div class="header-container">
                    <div class="nav-logo">
                        <a href="index-2.html">
                            <div class="logo logo-dark" style="background-image: url('/img/talk2gov.jpg')"></div>
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
@include('admin.sidebar') --}}
            <div class="page-container">
                {{-- <div class="quick-view">
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
                </div> --}}
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Plan Payment</h4>
                                        <div class="card-toolbar">
                                         
                                        </div>
                                    </div>
                                    <div class="modal-dialog __modal-dialog">
                                           <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="text-center">Donate</h2>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST" role="form">
                                                    <div class="form-group">
                                                        <label for="">Email Address</label>
                                                    <input type="email" disabled value="{{Auth::user()->email}}"  class="form-control" id="" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Amount (NGN)</label>
                                                        <input type="text" name="amount" class="form-control" id="amount" placeholder="">
                                                    </div>
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-3 col-xs-3"></div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <button type="button" class="btn btn-primary"
                                                            onclick="payWithPaystack()"> Pay Now</button>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3"></div>
                                                    </div>    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="content-footer">
                    <div class="footer">
                        <div class="copyright">
                            <span>Copyright © 2018 <b class="text-dark"><a href="http://www.raoatech.com">Raoatech IT Electromech</a></b>. All rights reserved.</span>
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
     <script>
            function payWithPaystack(){
                var user_id = $('#user_id').val();
                var amount = $('#amount').val();
                    amount = amount * 100;
                var handler = PaystackPop.setup({
                    key: 'pk_test_2290789cd99a94f5c07a3621f36eb74dd7fc7229',
                    // subaccount: 'ACCT_z2mt1uq2r3yaw8d',
                    // bearer:'subaccount',
                    user_id: user_id,
                    amount: amount,
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
                var key = 'Bearer sk_test_747644d7d69c96503375541dcd436818273a5e56';
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
                        if(response.data.status == 'error')
                        {
                            alert('Error making payment. Kidly try again!!')
                            window.location.href =  window.location.origin+'/user/index';
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
                var url = '/admin/user/savePayment';
                var user_id = {{Auth::user()-id}}
                var token = $('meta[name="csrf-token"]').attr('content')
                var data = {
                    "_method": 'POST',
                    "_token": token,
                    transact_id: reference,
                    status: status,
                    user_id: user_id,
                    payin_time: time,
                }
                    console.log(data);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(data) {
                        alert('Payment made successfully')
                    window.location.href =  window.location.origin+'/user/index';
                    },
                    dataType: 'JSON'
                });
            }
        </script>
</body>
</html>
@endif