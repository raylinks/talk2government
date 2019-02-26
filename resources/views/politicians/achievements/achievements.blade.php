@extends('shared.master')
@section('title', 'Achievements')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Achievements</h3>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @foreach ($errors->all() as $error)
                    <p id="success"class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                    <div id="success" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Content</label><br>
                            <textarea name="content" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Picture</label>
                            <input type="file" name="picture" id="exampleInputFile">
                            <p class="help-block">Enter Office Achievements Here.</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>  
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Achievements</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Achievement</th>
                                <th>Picture</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($achievements as $achievement)
                            <tr>
                                <td>{!! $id++ !!}</td>
                                <td>{!! $achievement->content !!}</td>
                                <td><img src="/images/{{ $achievement->picture }}" style="height:60px; width: 60px;" class="avatar border-gray"></td>
                                <td class="td-actions text-right">
                                    {!! $achievement->created_at !!}
                                </td>
                                <td><a href="{!! action('AchievementController@update', $achievement->id)!!}">update</a>
                                    <a href="{!! action('AchievementController@destroy', $achievement->id)!!}">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Achievement</th>
                                <th>Picture</th>
                                <th>Date Created</th>
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