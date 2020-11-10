@extends('backend.layout.master')

@section('title', 'Edit Group Category')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')
<script>
croppieRatio = 16/7;
</script>
<section class="content-header">
    <h1>
        Chỉnh sửa nhóm thể loại
        <small><a href="{{ route('admin.group-category.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay về</a></small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol> -->
</section>
<script>
    var croppieRatio = 16/7;
</script>
<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Chi tiết chỉnh sửa</h3>
                </div>

                <form action="{{ route('admin.group-category.update',$group_category->id) }}" method="POST"
                    enctype="multipart/form-data" role="form">
                    @csrf
                    @method('PUT')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="groupcategoryname">Tên nhóm thể loại</label>
                            <input type="text" name="name" class="form-control" value="{{ $group_category->name }}"
                                id="groupcategoryname">
                        </div>
                        <div class="form-group">
                            <label for="groupcategoryimage">Hình ảnh của nhóm thể loại</label>
                            {{-- <input type="file" name="image" id="groupcategoryimage"> --}}
                            <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="groupcategoryimage">
                            <input id="{{$uniqid}}" type="hidden" name="image">
                            <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" {{ $group_category->status ? 'checked' : '' }}> Có
                                hiệu lực
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Cập nhật</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ảnh nhóm thể loại hiện tại</h3>
                </div>
                <div class="box-body">
                    <img src="{{ asset('images/'.$group_category->image) }}" alt="{{ $group_category->name }}"
                        class="img-responsive">
                </div>
            </div>
        </div>

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
@endpusht>
@endpush
