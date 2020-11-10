@extends('authentication.master')

@section('title', 'ResetPassWord')

@section('content')

<div class="login-box">

    <div class="login-logo">
        <a href="{{ route('home') }}">
            @if(isset($setting) && $setting['site_logo'])
            <img src="{{ asset('images/'.$setting['site_logo']) }}" alt="Logo">
            @elseif(isset($setting) && $setting['site_name'])
            {{ $setting['site_name'] }}
            @else
            <b>ADMIN</b>
            @endif
        </a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Thay đổi mật khẩu</p>

        @if (session()->has('errorcredentials'))
        <div class="text-center has-error">
            <span class="help-block">
                <strong>{!! session()->get('errorcredentials') !!}</strong>
            </span>
        </div>
        @endif

        <form action="{{ route('reset.password') }}" method="post">
            @csrf

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('cupassword') ? ' has-error' : '' }}">
                <input type="password" name="cupassword" class="form-control" placeholder="Mật khẩu hiện tại">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('cupassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('cupassword') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('repassword') ? ' has-error' : '' }}">
                <input type="password" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu mới">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('repassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('repassword') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đổi mật khẩu</button>
                </div>
            </div>

        </form>
    </div>

</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue'
            , radioClass: 'iradio_square-blue'
            , increaseArea: '20%' /* optional */
        });
    });

</script>
@endpush
