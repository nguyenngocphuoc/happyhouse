@extends('backend.layout.master')

@section('title', 'Create Group Category')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')
<script>
croppieRatio = 16/7;
</script>
<section class="content-header">
    <h1>
        Tạo mới nhóm thể loại
        <small><a href="{{ route('admin.group-category.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
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

        <form action="{{ route('admin.group-category.store') }}" method="POST" enctype="multipart/form-data"
            role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới một nhóm thể loại</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="groupcategoryname">Tên nhóm thể loại</label>
                            <input type="text" name="name" class="form-control" id="groupcategoryname"
                                value="{{ old('name') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hình ảnh của nhóm thể loại</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {{-- <input type="file" name="image" id="groupcategoryimage"> --}}
                            <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="image">
                            <input id="{{$uniqid}}" type="hidden" name="image">
                            <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                @if (old('status') == 'on')
                                <input type="checkbox" name="status"> Có hiệu lực
                                @endif
                                @if (old('status') != 'on')
                                <input type="checkbox" name="status" checked> Có hiệu lực
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Đăng ký</button>
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
