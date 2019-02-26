@extends('layouts.admin')
@section('content')

  <div class="container" style="max-width: 500px;">

    <div class="card mt-5">

    <div class="card-body">
    <form method="post">
      @csrf
    <h1 class="text-center">Super<b>Admin</b></h1>
    <p class="text-center">Provide necessary details</p>
      <div class="form-group">
        <input type="email" required name="email" class="form-control" placeholder="Email address">
      </div>
      <div class="form-group">
        <input type="password" required name="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
      <div class="row text-center">
        <!--<div class="col-md-6">-->
        <!--  <a href="/admin/forgot">Forgot Password?</a>-->
        <!--</div>-->
        <!--<div class="col-md-6">-->
        <!--  <a href="/admin/register">Create new Account</a>-->
        <!--</div>-->
      </div>
  </form>
    </div>
    </div>
  </div>

@stop