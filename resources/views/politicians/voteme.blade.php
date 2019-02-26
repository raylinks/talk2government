@extends('master')
@section('title', 'VoteME')
@section('content') 
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Vote For Me</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                    {{ csrf_field() }}
                       <label>From:</label>  <input type="date" name="from"> 
                       <label>TO:</label> <input type="date" name="to">
                       <button type="submit" class="btn btn-info btn-fill ">Search</button>
                       <a class="pull-right" style="margin-left: 10px;" href="{{ route('export1.file',['type'=>'xls']) }}">Export to Excel</a>
                       <a class="pull-right" href="{{ route('export1.file',['type'=>'csv']) }}">Export to CSV</a>
                </form>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>District</th>
                                <th>Comment1</th>
                                <th>Comment2</th>
                                <th>Comment3</th>
                                 <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($votemes as $voteme)
                            <tr>
                                <td>{!! $id++ !!}</td>
                                <td>{!! $voteme->user_id !!}</td>
                                <td>{!! $voteme->value !!}</td>
                                <td>{!! $voteme->district !!}</td>
                                <td>{!! $voteme->comment1 !!}</td>
                                <td>{!! $voteme->comment2 !!}</td>
                                <td>{!! $voteme->comment3 !!}</td>
                                <td>{!! $voteme->created_at !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>District</th>
                                <th>Comment1</th>
                                <th>Comment2</th>
                                <th>Comment3</th>
                                 <th>Date Created</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection