@extends('authentication.master')

@section('title', 'Login')

@section('content')

<div class="login-box">

    <div class="login-logo">
        <a href="{{ route('home') }}">
            @if(isset($setting) && $setting['site_logo'])
            <img src="{{ asset('images/'.$setting['site_logo']) }}" alt="Logo" width="200px" height="50px">
            @elseif(isset($setting) && $setting['site_name'])
            {{ $setting['site_name'] }}
            @else
            <b>ADMIN</b>
            @endif
        </a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập vào trang ADMIN</p>

        @if (session()->has('errorcredentials'))
        <div class="text-center has-error">
            <span class="help-block">
                <strong>{!! session()->get('errorcredentials') !!}</strong>
            </span>
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">
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
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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
