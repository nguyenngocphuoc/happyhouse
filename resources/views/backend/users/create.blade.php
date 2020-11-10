@extends('backend.layout.master')

@section('title', 'Create User')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Tạo mới người dùng
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

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="col-md-6">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới người dùng</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="username">Tên</label>
                            <input type="text" name="name" class="form-control" id="username" value="{{ old('name') }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('email'))has-error @endif">
                            <label for="useremail">Email</label>
                            <input type="email" name="email" class="form-control" id="useremail"
                                value="{{ old('email') }}">
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('password'))has-error @endif">
                            <label for="userpassword">Password</label>
                            <input type="password" name="password" class="form-control" id="userpassword"
                                value="{{ old('password') }}">
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('description'))has-error @endif">
                            <label for="description">Mô tả bản thân</label>
                            <textarea type="text" name="description" class="form-control"
                                id="description">{{ old('description') }}</textarea>
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('position'))has-error @endif">
                            <label for="userposition">Vị trí</label>
                            <input type="position" name="position" class="form-control" id="userposition"
                                value="{{ old('position') }}">
                            <span class="help-block">{{ $errors->first('position') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('facebook'))has-error @endif">
                            <label for="userfacebook">Facebook</label>
                            <input type="facebook" name="facebook" class="form-control" id="userfacebook"
                                value="{{ old('facebook') }}">
                            <span class="help-block">{{ $errors->first('facebook') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('twitter'))has-error @endif">
                            <label for="usertwitter">Twitter</label>
                            <input type="twitter" name="twitter" class="form-control" id="usertwitter"
                                value="{{ old('twitter') }}">
                            <span class="help-block">{{ $errors->first('twitter') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('instagram'))has-error @endif">
                            <label for="userinstagram">Instagram</label>
                            <input type="instagram" name="instagram" class="form-control" id="userinstagram"
                                value="{{ old('instagram') }}">
                            <span class="help-block">{{ $errors->first('instagram') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group @if($errors->has('role_id'))has-error @endif">
                            <label>Quyền</label>
                            <select name="role_id" class="form-control select2" style="width: 100%;">
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if($role->id == old('role_id'))
                                    {{'selected'}}
                                    @endif)>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('role_id') }}</span>
                        </div>
                        <div class="form-group @if($errors->has('email'))has-error @endif">
                            <label for="userimage">Ảnh</label>
                            <input type="file" name="photo" id="userimage">
                            <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" checked> Hoạt động
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Xác nhận</button>
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