@extends('backend.layout.master')

@section('title', 'Create district')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')
<script>
    croppieRatio = 10/7;
</script>
<section class="content-header">
    <h1>
        Tạo mới tỉnh
        <small><a href="{{ route('admin.district.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
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

        <form action="{{ route('admin.district.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới một tỉnh</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="districtname">Tên tỉnh</label>
                            <input value="{{ old('name')}}" type="text" name="name" class="form-control"
                                id="districtname">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group @if($errors->has('romanji_name'))has-error @endif">
                            <label for="romanji_name">Tên romanji tỉnh</label>
                            <input value="{{ old('romanji_name')}}" type="text" name="romanji_name" class="form-control"
                                id="romanji_name">
                            <span class="help-block">{{ $errors->first('romanji_name') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hình ảnh</h3>
                    </div>
                    <div class="box-body">
                        <div class="checkbox">
                            <div class="form-group @if($errors->has('image'))has-error @endif">
                                {{-- <input type="file" name="image" id="categoryimage"> --}}
                                <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="categoryimage">
                                <input id="{{$uniqid}}" type="hidden" name="image" value="{{ old('image')}}">
                                <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                                <img id="postimage" src="@if(old('image', null) != null) 
                                                                                    {{ old('image')}} 
                                                                                    @else {{url('img/no-image.jpg')}} 
                                                                                    @endif" height="200">
                                <span class="help-block">{{ $errors->first('image') }}</span>
                            </div>
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