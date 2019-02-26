@extends('shared.master')
@section('title', 'Profile')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit User Profile</h4>
                    </div>
                    <div class="content">
                        <form method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" class="form-control" name="title" value="{{ $politician->userDetail->title }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" class="form-control" name="middlename"  value="{{ $politician->userDetail->middlename }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email"  class="form-control" name="email" value="{{ $politician->userDetail->email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="{{ $politician->userDetail->firstname }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lastname"  value="{{ $politician->userDetail->lastname }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Profile</label>
                                        <input type="text" class="form-control" name="profile" value="{{ $politician->userDetail->profile }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state"  value="{!! Auth::user()->state !!}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" value="{!! Auth::user()->country !!}">
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file" name="picture" id="exampleInputFile">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <a href="#">
                                <img src="/images/{{ $politician->userDetail->picture }}" class="avatar border-gray">

                                <h4 class="title">{{ $politician->userDetail->title }} {{ $politician->userDetail->lastname }} {{ $politician->userDetail->firstname }}<br />
                                    <small>{{ $politician->userDetail->email }}</small>
                                </h4>
                            </a>
                        </div>
                        <p class="description text-center"> {{ $politician->userDetail->profile }}
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection