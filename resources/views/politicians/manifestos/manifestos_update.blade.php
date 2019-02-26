@extends('shared.master')
@section('title', 'Home')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Create Manifestos <small></small></h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class="box-body pad">
        <form method="post">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
           
             <textarea class="textarea" name="content" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $manifestos->content !!}</textarea>
                     
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
        </div>
    </div>
</section>

<!--<section class="content">
    <div class="row">
         left column 
        <div class="col-md-6">
            
        </div>
        <div class="col-md-6">
            
        </div>
            
    </div>
</section>-->



@endsection