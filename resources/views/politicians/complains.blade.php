@extends('shared.master')
@section('title', 'TalkToMe')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Talk To Me</h3>
                </div>
                <form method="POST">
                    {{ csrf_field() }}
                       <label>From:</label>  <input type="date" name="from"> 
                       <label>TO:</label> <input type="date" name="to">
                       <button type="submit" class="btn btn-info btn-fill ">Search</button>
                 </form>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Slug</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Picture</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complains as $complain)
                            <tr>
                                <td>{!! $id++ !!}</td>
                                <th>{!! $complain->slug !!}</th>
                                <td>{!! $complain->name !!}</td>
                                <td>{!! $complain->email !!}</td>
                                <td>{!! $complain->subject !!}</td>
                                <td>{!! $complain->message !!}</td>
                                <td><img src="/images/{{ $complain->picture }}" style="height:60px; width: 60px;" class="avatar border-gray"></td>
                                <td>{!! $complain->created_at !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection