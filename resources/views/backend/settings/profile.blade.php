@extends('backend.layout.master')

@section('title', 'Profile')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        {{ auth()->user()->name }}'s Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Profile</h3>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf

                    <div class="box-body">
                        <div class="form-group @if($errors->has('address'))has-error @endif">
                            <label for="editusername">Họ và Tên</label>
                            <!-- 
                                @php
                                $name = old('name') ? old('name') : $user->name
                                @endphp
                            -->
                            <input type="text" name="name" class="form-control" id="editusername" value="{{ $name }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="edituseremail">Email</label>
                            <!-- 
                                @php
                                $email = old('email') ? old('email') : $user->email
                                @endphp
                            -->
                            <input type="text" name="email" class="form-control" id="editusername" value="{{ $email }}">
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả bản thân</label>
                            <!-- 
                                @php
                                $description = old('description') ? old('description') : $user->description
                                @endphp
                            -->
                            <textarea type="text" name="description" class="form-control"
                                id="description">{{ $description }}</textarea>
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="edituserposition">Vị trí (Danh nghĩa)</label>
                            <input type="text" name="position" class="form-control" id="edituserposition"
                                value="{{ $user->position }}">
                        </div>
                        <div class="form-group">
                            <label for="edituserfacebook">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="edituserfacebook"
                                value="{{ $user->facebook }}">
                        </div>
                        <div class="form-group">
                            <label for="editusertwitter">Twitter</label>
                            <input type="text" name="twitter" class="form-control" id="editusertwitter"
                                value="{{ $user->twitter }}">
                        </div>
                        <div class="form-group">
                            <label for="edituserinstagram">Instagram</label>
                            <input type="text" name="instagram" class="form-control" id="edituserinstagram"
                                value="{{ $user->instagram }}">
                        </div>
                        <div class="box-img">
                            <img src="{{ asset('images/'.$user->photo) }}" alt="{{ $user->name }}"
                                class="img-responsive">
                        </div>
                        <div class="form-group">
                            <label for="userimage">Featured Image</label>
                            <input type="file" name="photo" id="userimage">
                            <p class="help-block">(Image must be in .png or .jpg format)</p>
                        </div>
                        <hr>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" {{ $user->status ? 'checked' : '' }}> Active
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">UPDATE</button>
                    </div>

                </form>

            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <form action="{{ route('profile.changepassword') }}" method="POST" role="form">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="currentpassword">Current Password</label>
                            <input type="password" name="currentpassword" class="form-control" id="currentpassword">
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" name="newpassword" class="form-control" id="newpassword">
                        </div>
                        <div class="form-group">
                            <label for="newpasconfirm">Confirm Password</label>
                            <input type="password" name="newpassword_confirmation" class="form-control"
                                id="newpasconfirm">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">CHANGE PASSWORD</button>
                    </div>
                </form>
            </div>
        </div>

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