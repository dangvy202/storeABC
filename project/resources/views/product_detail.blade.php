@extends('master')
@section('content')
    <div class="tit">
		<span>Trang chủ <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Sản phẩm</span>
	</div>
	<div class="product_detail">
			<div class="img">
				<img src="{{ asset('public/images/product/'.$data->product_img1) }}">
				<img src="{{ asset('public/images/product/'.$data->product_img2) }}">
			</div>
			<div class="info">
				<h2>{{ $data->product_name }}</h2>
				<p>Mã sản phẩm: {{ $data->product_code }}</p>
				<h2>{{ number_format($data->product_price) }} đ</h2>
				<a href="{{route('add-cart', $data->id)}}" class='add_cart'>Thêm vào giỏ</a>
			</div>
		</div>
		<h2 class="product">Sản phẩm liên quan</h2>
		<div class="product_next">
			
		</div>
@stop()