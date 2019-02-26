@extends('shared.master')
@section('title', 'Profile')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">User Profile</h4>
                    </div>

                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" class="form-control" disabled placeholder="" value="{{ $politician->userDetail->title }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" disabled value="{{ $politician->userDetail->lastname }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control"disabled="" value="{{ $politician->userDetail->firstname }}">
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" disabled="" value="{{ $politician->userDetail->middlename }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" disabled class="form-control" value="{{ $politician->userDetail->email }}">
                                            </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Position</label>
                                        <input type="text" disabled class="form-control" value="{{ $user->position }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State</label>
                                        <input type="text" disabled class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Party</label>
                                        <input type="text" disabled class="form-control" value="{{ $user->party }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Profile</label>
                                        <input type="text" class="form-control" disabled="" value="{{ $politician->userDetail->profile }}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" disabled="" value="{{ $politician->userDetail->state }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" disabled="" value="{{ $politician->userDetail->country }}">
                                    </div>
                                </div>
                            </div> --}}
                            <a href="{!! action('UserDetailController@edit', Auth::user()->id) !!}" class="btn btn-info btn-fill pull-right">Edit Profile</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" style="height: 300; width: 400" alt="..."/>
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
                        <p class="description text-center">About: {{ $politician->userDetail->profile }}
                        </p>
                        <p class="description text-center">Mission: 
                        @foreach($missions as $mission)
                        {!! $mission->content !!}
                        <br/>
                        @endforeach
                        </p>

                        <p class="description text-center">Vision:
                        @foreach($visions as $vision)
                         {!! $vision->content !!}
                         <br/>
                        @endforeach
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