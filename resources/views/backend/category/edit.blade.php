@extends('backend.layout.master')

@section('title', 'Edit Category')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Chỉnh sửa thể loại
        <small><a href="{{ route('admin.category.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
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
        <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data"
            role="form">
            @csrf
            @method('PUT')
            <div class="col-md-6">

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Chi tiết chỉnh sửa</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group @if($errors->has('slug'))has-error @endif">
                            <label for="newsslug">Slug</label>
                            <!-- 
                                @php
                                $slug = old('slug') ? old('slug') : $category->slug
                                @endphp
                            -->
                            <input value="{{ $slug }}" type="text" name="slug" class="form-control" id="newsslug">
                            <span class="help-block">{{ $errors->first('slug') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="categoryname">Tên thể loại</label>
                            <!-- 
                                @php
                                $name = old('name') ? old('name') : $category->name
                                @endphp
                            -->
                            <input value="{{ $name }}" type="text" name="name" class="form-control" id="categoryname">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('group_categories_id'))has-error @endif">
                            <!--<label for="categoryname">Nhóm thể loại</label>
                            <select id="group_categories_id" name="group_categories_id"
                                class="form-control has-feedback{{ $errors->has('group_categories_id') ? ' has-error' : '' }}">
                                @foreach($arrGroupCategory as $key => $grcategory)
                                @if ($category->group_categories_id == $grcategory->id)
                                <option selected value="{{$grcategory->id}}">{{$grcategory->name}}</option>
                                @endif
                                @if ($category->group_categories_id != $grcategory->id)
                                <option value="{{$grcategory->id}}">{{$grcategory->name}}</option>
                                @endif
                                @endforeach
                            </select>-->
                            <input value="{{$arrGroupCategory[0]->id}}" type="hidden" name="group_categories_id"
                                class="form-control" id="group_categories_id">
                            <span class="help-block">{{ $errors->first('group_categories_id') }}</span>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" {{ $category->status ? 'checked' : '' }}> Có hiệu
                                lực
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ảnh thể loại</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group @if($errors->has('details'))has-error @endif">
                            <label for="categoryimage">Hình ảnh của thể loại</label>
                            <!-- 
                                @php
                                $image = old('image') ? old('image') : url('images/'.$category->image)
                                @endphp
                            -->
                            {{-- <input type="file" name="image" id="categoryimage"> --}}
                            <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="categoryimage">
                            <input id="{{$uniqid}}" type="hidden" name="image" value="{{ old('image')}}">
                            <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                            <img id="postimage" src="{{$image}}" alt="{{ $category->name }}" class="img-responsive">
                            <span class="help-block">{{ $errors->first('details') }}</span>
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