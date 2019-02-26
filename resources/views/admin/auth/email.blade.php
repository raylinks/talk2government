@extends('layouts.admin')
@section('content')

    <div class="container" style="max-width: 500px;">

        <div class="card mt-5">

            <div class="card-body">
                <form method="post">
                    @csrf
                    <h1 class="text-center">Super<b>Admin</b></h1>
                    <p class="text-center">Enter Email</p>
                    <div class="form-group">
                        <input type="email" required name="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop