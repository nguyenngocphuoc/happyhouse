@extends('backend.layout.master')

@section('title', 'Edit User')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Cập nhật người dùng
        <small><a href="{{ route('admin.users.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay lại</a></small>
    </h1>
    {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol> --}}
</section>

<section class="content">
    <div class="row">

        <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data"
            role="form">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="editusername">Tên</label>
                            <input type="text" name="name" class="form-control" id="editusername"
                                value="{{ old('name') ? old('name') : $user->name }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('email'))has-error @endif">
                            <label for="edituseremail">Email</label>
                            <input type="email" name="email" class="form-control" id="edituseremail"
                                value="{{ old('email') ? old('email') : $user->email }}">
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('role_id'))has-error @endif">
                            <label>Quyền</label>
                            <select name="role_id" class="form-control select2" style="width: 100%;">
                                @foreach($roles as $role)
                                <!-- 
                                    @php
                                    $role_id = old('role_id') ? old('role_id') : $user->role_id
                                    @endphp
                                -->
                                <option value="{{ $role->id }}" @if($role->id == $role_id)
                                    {{'selected'}}
                                    @endif)>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('role_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('description'))has-error @endif">
                            <label for="description">Mô tả bản thân</label>
                            <textarea type="text" name="description" class="form-control"
                                id="description">{{ old('description') ? old('description') : $user->description }}</textarea>
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('position'))has-error @endif">
                            <label for="edituserposition">Vị trí</label>
                            <input type="position" name="position" class="form-control" id="edituserposition"
                                value="{{ old('position') ? old('position') : $user->position }}">
                            <span class="help-block">{{ $errors->first('position') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('facebook'))has-error @endif">
                            <label for="edituserfacebook">Facebook</label>
                            <input type="facebook" name="facebook" class="form-control" id="edituserfacebook"
                                value="{{ old('facebook') ? old('facebook') : $user->facebook }}">
                            <span class="help-block">{{ $errors->first('facebook') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('twitter'))has-error @endif">
                            <label for="editusertwitter">Twitter</label>
                            <input type="twitter" name="twitter" class="form-control" id="editusertwitter"
                                value="{{ old('twitter') ? old('twitter') : $user->twitter }}">
                            <span class="help-block">{{ $errors->first('twitter') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('instagram'))has-error @endif">
                            <label for="edituserinstagram">Instagram</label>
                            <input type="instagram" name="instagram" class="form-control" id="edituserinstagram"
                                value="{{ old('instagram') ? old('instagram') : $user->instagram }}">
                            <span class="help-block">{{ $errors->first('instagram') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-img">
                            <img src="{{ asset('images/'.$user->photo) }}" alt="{{ $user->name }}"
                                class="img-responsive">
                        </div>
                        <div class="form-group">
                            <label for="newsimage">Ảnh</label>
                            <input type="file" name="photo" id="newsimage">
                            <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                        </div>
                        <hr>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" {{ $user->status ? 'checked' : '' }}> Hoạt động
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Cập nhật</button>
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
@endpush