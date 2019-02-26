@extends('layouts.master3')
@section('content')
    <div class="container inner-container">
        <div class="section-title text-center">
            <h1>GET IN WITH </h1>
            <p class="wd-50">
                Drop Your Message...and we will get back to you.
            </p>
        </div>

        <div class="contact-form-container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12 pull-right">
                    <form method="POST" class="contact-form" enctype="multipart/form-data">
                        @csrf
                        <p>Full name <span style="color:red">*</span><input type="text" required  value="" name="name" placeholder="Name"></p>
                        <p>Email <span style="color:red">*</span><input type="text" required   value="" name="email" required placeholder="Email"></p>
                        <p>Phone number <span style="color:red">*</span><input type="text" name="phone"  required placeholder="Subject"></p>
                        <p>Message <span style="color:red">*</span><textarea name="messag" required placeholder="Message"></textarea></p>
                        <!--<div class="col-md-4">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Profile Picture</label>-->
                        <!--        <input type="file" name="picture" id="exampleInputFile">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <button type="submit" class="theme-btn btn-lg">
                            <span>Submit Now</span>
                        </button>
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
    </div>
@endsection