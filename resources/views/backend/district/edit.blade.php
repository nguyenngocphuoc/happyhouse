@extends('backend.layout.master')

@section('title', 'Edit district')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Chỉnh sửa tỉnh
        <small><a href="{{ route('admin.district.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay về</a></small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol> -->
</section>
<script>
    croppieRatio = 10/7;
</script>
<section class="content">
    <div class="row">
        <form action="{{ route('admin.district.update',$district->id) }}" method="POST" enctype="multipart/form-data"
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
                            <label for="districtname">Tên tỉnh</label>
                            <!-- 
                                @php
                                $name = old('name') ? old('name') : $district->name
                                @endphp
                            -->
                            <input value="{{ $name }}" type="text" name="name" class="form-control" id="districtname">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('romanji_name'))has-error @endif">
                            <label for="districtname">Tên romanji tỉnh</label>
                            <!-- 
                                @php
                                $romanji_name = old('romanji_name') ? old('romanji_name') : $district->romanji_name
                                @endphp
                            -->
                            <input value="{{ $romanji_name }}" type="text" name="romanji_name" class="form-control"
                                id="districtname">
                            <span class="help-block">{{ $errors->first('romanji_name') }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="checkbox">
                            <div class="form-group @if($errors->has('details'))has-error @endif">
                                <label for="districtimage">Hình ảnh của thể loại</label>
                                <!-- 
                                    @php
                                    $image = old('image') ? old('image') : url('images/'.$district->image)
                                    @endphp
                                -->
                                {{-- <input type="file" name="image" id="districtimage"> --}}
                                <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="districtimage">
                                <input id="{{$uniqid}}" type="hidden" name="image" value="{{ old('image')}}">
                                <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                                <img id="postimage" src="{{$image}}" alt="{{ $district->name }}" class="img-responsive">
                                <span class="help-block">{{ $errors->first('details') }}</span>
                            </div>
                            <label>
                                <input type="checkbox" name="status" {{ $district->status ? 'checked' : '' }}> Có hiệu
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