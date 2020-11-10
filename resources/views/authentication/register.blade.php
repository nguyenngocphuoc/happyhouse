@extends('authentication.master')

@section('title', 'Register')


@section('content')

<div class="register-box">

    <div class="register-logo">
        <b>ĐĂNG KÝ TƯ VẤN</b>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg"></p>

        <form action="/" method="post">
            @csrf

            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{ old('name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                <span class="help-block">
                    <em>{{ $errors->first('name') }}</em>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <em>{{ $errors->first('email') }}</em>
                </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                <input style="padding-right: 5px;" type="date" name="date_of_birth" class="form-control" placeholder="Ngày sinh" value="{{ old('date_of_birth') }}">
                @if ($errors->has('date_of_birth'))
                <span class="help-block">
                    <em>{{ $errors->first('date_of_birth') }}</em>
                </span>
                @endif
            </div>
            <div style="margin: 5px;">Đăng ký tư vấn chương trình</div>
            <div class="form-group has-feedback{{ $errors->has('category_id') ? ' has-error' : '' }}">
                <!-- <input type="email" name="email" class="form-control" placeholder="Đăng ký tư vấn chương trình" value="{{ old('email') }}">-->
                <select id="Category" name="category_id" class="form-control has-feedback{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    @foreach($arrCategory as $key => $topnews)
                    @if (old('category_id') == $key)
                    <option selected value="{{$key}}">{{$topnews}}</option>
                    @endif
                    @if (old('category_id')!= $key)
                    <option value="{{$key}}">{{$topnews}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                <span class="help-block">
                    <em>{{ $errors->first('category_id') }}</em>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('address') ? ' has-error' : '' }}">
                <input type="address" name="address" class="form-control" placeholder="Địa chỉ" value="{{ old('address') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('address'))
                <span class="help-block">
                    <em>{{ $errors->first('address') }}</em>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
                <input type="phone" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('phone'))
                <span class="help-block">
                    <em>{{ $errors->first('phone') }}</em>
                </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook
            </a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+
            </a>
        </div>

        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>

</div>

@endsection
