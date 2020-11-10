@extends('backend.layout.master')

@section('title', 'Edit status')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Chỉnh sửa thể loại
        <small><a href="{{ route('admin.status.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay về</a></small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol> -->
</section>
<script>
    croppieRatio = 16/7;
</script>
<section class="content">
    <div class="row">
        <form action="{{ route('admin.status.update',$status->id) }}" method="POST" enctype="multipart/form-data"
            role="form">
            @csrf
            @method('PUT')
            <div class="col-md-6">

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Chi tiết chỉnh sửa</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="statusname">Tên thể loại</label>
                            <!-- 
                                @php
                                $name = old('name') ? old('name') : $status->name
                                @endphp
                            -->
                            <input value="{{ $name }}" type="text" name="name" class="form-control" id="statusname">
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
                            <!-- 
                                @php
                                $color = old('color') ? old('color') : $status->color
                                @endphp
                            -->
                            <input type="color" id="favcolor" name="color" class="form-control" value="{{ $color }}">
                            <span class="help-block">{{ $errors->first('color') }}</span>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" {{ $status->status ? 'checked' : '' }}> Có hiệu
                                lực
                            </label>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Cập nhật</button>
                        </div>
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
    $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });
        });
</script>
@endpusht>
@endpush