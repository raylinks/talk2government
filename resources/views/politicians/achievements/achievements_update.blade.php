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
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Content</label><br>
                            <textarea name="content" placeholder="">
                                {!! $achievements->content !!}
                            </textarea>
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
    </div>
</section>
@endsection