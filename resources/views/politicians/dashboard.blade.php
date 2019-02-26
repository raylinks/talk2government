@extends('master')
@section('title', 'Home')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">VOTE ME Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div><!-- /.box-body -->
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> Yes - 60%
                        <i class="fa fa-circle text-danger"></i> No - 40%
                        <a href="/users/report" class="pull-right">view more details</a>
                    </div>
                </div>
            </div><!-- /.box -->
              <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">LG VOTE-ME Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                    <div class="footer">
                    <div class="legend">
                        <a href="/users/report" class="pull-right">view more details</a>
                    </div>
                </div>
                </div>
            </div>
           
        </div><!-- /.col (LEFT) -->
        <div class="col-md-6">

             <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">LG VOTE-ME Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                    <div class="footer">
                    <div class="legend">
                         <a href="/users/report" class="pull-right">view more details</a>
                    </div>
                </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Users LG Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="areaChart" style="height:250px"></canvas>
                    </div>
                    <div class="footer">
                    <div class="legend">
                        <a href="/users/report" class="pull-right">view more details</a>
                    </div>
                </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.col (RIGHT) -->
</section><!-- /.content -->
@endsection
