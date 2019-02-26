@extends('layouts.admin')
@section('content')

  <div class="container" style="max-width: 500px;">

    <div class="card mt-5">

    <div class="card-body">
    <form method="post">
    @csrf
    <h1 class="text-center">Super<b>Admin</b></h1>
    <p class="text-center">Provide necessary details</p>
      
      {{--<div class="form-group">--}}

        {{--<input type="text" class="form-control" placeholder="Username">--}}

      {{--</div>--}}

      <div class="form-group">

        <input type="email" name="email" class="form-control" placeholder="Email address">
        <p>
          @if($errors->has('email'))
          <span class="alert alert-danger">{{$errors->first('email')}}</span>
          @endif
        </p>
      </div>

      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
        @if($errors->has('password'))
          <span class="alert alert-danger">{{$errors->first('password')}}</span>
        @endif
      </div>

      <div class="form-group">

        <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password">
      </div>

      <div class="form-group">

        <button type="submit" class="btn btn-primary btn-block">Register</button>

      </div>
      <p class="text-center"><a href="/admin/login">Already a user</a></p>
  </form>
    </div>
    </div>
  </div>
@stop