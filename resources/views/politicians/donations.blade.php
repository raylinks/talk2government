@extends('master')
@section('title', 'Donations')
@section('content') 
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Donations</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                    {{ csrf_field() }}
                       <label>From:</label>  <input type="date" name="from"> 
                       <label>TO:</label> <input type="date" name="to">
                       <button type="submit" class="btn btn-info btn-fill ">Search</button>
                       <a class="pull-right" style="margin-left: 10px;" href="{{ route('export3.file',['type'=>'xls']) }}">Export to Excel</a>
                       <a class="pull-right" href="{{ route('export3.file',['type'=>'csv']) }}">Export to CSV</a>
                </form>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                            <tr>
                                <td>{!! $id++ !!}</td>
                                <td>{!! $donation->reference !!}</td>
                                <td>{!! $donation->status !!}</td>
                                <td>{!! $donation->name !!}</td>
                                <td>{!! $donation->email !!}</td>
                                <td>{!! $donation->amount !!}</td>
                                <td>{!! $donation->date !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection