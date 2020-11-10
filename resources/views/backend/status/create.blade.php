@extends('backend.layout.master')

@section('title', 'Create status')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')
<script>
    croppieRatio = 16/7;
</script>
<section class="content-header">
    <h1>
        Tạo mới thể loại
        <small><a href="{{ route('admin.status.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay về</a></small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol> -->
</section>

<section class="content">
    <div class="row">

        <form action="{{ route('admin.status.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới một thể loại</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="statusname">Tên thể loại</label>
                            <input value="{{ old('name')}}" type="text" name="name" class="form-control"
                                id="statusname">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group @if($errors->has('color'))has-error @endif">
                            <label for="favcolor">Màu sắc</label>
                            <input type="color" id="favcolor" name="color" class="form-control"
                                value="{{ old('color')}}">
                            <span class="help-block">{{ $errors->first('color') }}</span>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" checked> Có hiệu lực
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">CREATE</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</section>

@endsection

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue'
            , radioClass: 'iradio_square-blue'
        });
    });

</script>
@endpush