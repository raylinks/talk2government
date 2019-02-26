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
                    <p id="success" class="alert alert-danger">{{ $error }}</p>
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
                                <input type="text" name="location" required class="form-control pull-right" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" name="date" placeholder="01:50 PM" required="" class="form-control pull-right" id="reservation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Time:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="time" name="time" required class="form-control pull-right" >
                            </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Campaign</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{!! $id++ !!}</td>
                                <td>{!! $task->location !!}</td>
                                <td class="td-actions text-right">
                                    {!! $task->date !!}
                                </td>
                                <td>{!! $task->time !!}</td>
                                <td><a href="{!! action('CampaignController@update', $task->id)!!}">update</a>
                                    <a href="{!! action('CampaignController@destroy', $task->id)!!}">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection