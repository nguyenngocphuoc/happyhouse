@extends('backend.layout.master')

@section('title', 'Create Category')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Tạo mới thể loại
        <small><a href="{{ route('admin.category.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i class="fa fa-plus"></i> Quay về</a></small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol> -->
</section>

<section class="content">
    <div class="row">

        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới một thể loại</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="categoryname">Tên thể loại</label>
                            <input type="text" name="name" class="form-control" id="categoryname" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="categoryname">Nhóm thể loại</label>
                            <select id="group_categories_id" name="group_categories_id" class="form-control has-feedback{{ $errors->has('group_categories_id') ? ' has-error' : '' }}">
                                @foreach($arrGroupCategory as $key => $topnews)
                                @if (old('group_categories_id') == $topnews->id)
                                <option selected value="{{$topnews->id}}">{{$topnews->name}}</option>
                                @endif
                                @if (old('group_categories_id')!= $topnews->id)
                                <option value="{{$topnews->id}}">{{$topnews->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hình ảnh của thể loại</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="file" name="image" id="categoryimage" value="{{ old('image') }}">
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
