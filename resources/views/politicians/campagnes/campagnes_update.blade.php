@extends('shared.master')
@section('title', 'Campaigns')
@section('content')
 <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Create Campaign</h3>
                </div>
                <form method="POST"> 
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                    <div id="success" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Location:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa "></i>
                                </div>
                                <input type="text" name="location" value="{!! $tasks->location !!}" required class="form-control pull-right" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" name="date" value="{!! $tasks->date !!}" required="" class="form-control pull-right" id="reservation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Time:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="time" name="time"  value="{!! $tasks->time !!}" required class="form-control pull-right" >
                            </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection