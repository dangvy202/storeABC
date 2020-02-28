@extends('master')
@section('content')
    <div class="login">
        <form action="{{ route('register-post') }}" method="post">
            {{csrf_field()}}
            <div class="login_field">
                <p><label for="username">Người dùng</label></p>
                <input class="login_txt" type="text" name="username" id="username" value="{{ old('username') }}">
                @if($errors->has('username'))
                    <p class="miss">{{ $errors->first('username') }}</p>
                @endif
            </div>
            <div class="login_field">
                <p><label for="password">Mật khẩu</label></p>
                <input class="login_txt" type="password" name="password" id="password" value="{{ old('password') }}">
                @if($errors->has('password'))
                    <p class="miss">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="login_field">
                <p><label for="fullname">Họ và Tên</label></p>
                <input class="login_txt" type="text" name="fullname" id="fullname" value="{{ old('fullname') }}">
                @if($errors->has('fullname'))
                    <p class="miss">{{ $errors->first('fullname') }}</p>
                @endif
            </div>
            <div class="login_field">
                <p><label for="email">Email</label></p>
                <input class="login_txt" type="text" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <p class="miss">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="login_field">
                <p><label for="address">Địa Chỉ</label></p>
                <input class="login_txt" type="text" name="address" id="address" value="{{ old('address') }}">
                @if($errors->has('address'))
                    <p class="miss">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="login_field">
                <p><label for="phone">Số Điện Thoại</label></p>
                <input class="login_txt" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                @if($errors->has('phone'))
                    <p class="miss">{{ $errors->first('phone') }}</p>
                @endif
            </div>
            <div class="login_field">
                <input class="submit" type="submit" name="register" value="Đăng ký">
            </div>
        </form>
    </div>
@stop()