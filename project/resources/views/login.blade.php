@extends('master')
@section('content')
    <div class="login">
        <h2>Đăng nhập</h2>
        <form action="{{ route('login-post') }}" method="post">
            {{ csrf_field() }}
            @if(session('error'))
                <div class="login_field">
                    <p class="message">{{ session('error') }}</p>
                </div>
            @endif
            <div class="login_field">
                <p><label for="username">Người dùng</label></p>
                <input class="login_txt" type="text" name="username" id="username" value="{{ old('username') }}">
            </div>
            <div class="login_field">
                <p><label for="password">Mật khẩu</label></p>
                <input class="login_txt" type="password" name="password" id="password" value="{{ old('password') }}">
            </div>
            <div class="login_field">
                <input class="submit" type="submit" name="login" value="Đăng nhập">
                <p><a href="?action=forgot_password">Quên mật khẩu?</a></p>
                <p><a href="?action=register">Nếu bạn chưa có tài khoản ? Đăng ký</a></p>
            </div>
        </form>
    </div>
@stop()