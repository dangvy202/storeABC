@extends('master')
@section('content')
    <div class="tit">
		<span>Trang chủ <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Liên hệ</span>
	</div>
	<div class="contact">
		<div class="info">
			<p><span>Địa chỉ:</span> Số 6, đường số 18, khu DC Him Lam, xã Bình Hưng, huyện Bình Chánh, TP.HCM.</p>
			<p><span>Số điện thoại:</span> (012) 667788.</p>
			<p><span>Hotline:</span> 19001009.</p>
			<p><span>Email:</span> naturale@gmail.com</p>
			<p><span>Facebook:</span> https://www.facebook.com/naturalefashion</p>
		</div>
		<h2>Liên hệ với chúng tôi</h2>
		<form action="{{ route('send-mail') }}" method="post">
			{{ csrf_field() }}
			<p>Họ và tên</p>
			<input class="txt" type="text" name="fullname" value="{{ old('fullname')}}">
			@if($errors->has('fullname'))
				<p class="miss">{{ $errors->first('fullname') }}</p>
			@endif
			<p>Email</p>
			<input class="txt" type="text" name="email" value="{{ old('email')}}">
			@if($errors->has('email'))
				<p class="miss">{{ $errors->first('email') }}</p>
			@endif
			<p>Số điện thoại</p>
			<input class="txt" type="text" name="phone" value="{{ old('phone')}}">
			@if($errors->has('phone'))
				<p class="miss">{{ $errors->first('phone') }}</p>
			@endif
			<p>Bình luận</p>
			<textarea class="cmd" name="desc" cols="30" rows="7" value="{{ old('desc')}}"></textarea><br>
			@if($errors->has('desc'))
				<p class="miss">{{ $errors->first('desc') }}</p>
			@endif
			<input class="btn" type="submit" name="contact" value="GỬI">
			<p class="success"></p>
		</form>
	</div>
@stop()