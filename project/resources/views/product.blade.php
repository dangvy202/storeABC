@extends('master')
@section('content')
    <div class="tit">
		<span>Trang chủ <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Sản phẩm</span>
	</div>
	<div class="products">
        @foreach($data as $r)
            <div class="item">
                <a href="{{ route('product-detail', $r->id) }}">
                    <img src="{{ asset('public/images/product/'.$r->product_img1) }}">
                    <img src="{{ asset('public/images/product/'.$r->product_img2) }}">
                </a>
                <div class='pro_info'>
                    <p>{{ $r->product_name }}</p>
                    <p>{{ number_format($r->product_price) }} đ</p>
                    <a href="{{route('add-cart', $r->id)}}" class='add_cart'>Thêm vào giỏ</a>
                </div>
            </div>
        @endforeach
    </div>
    <span class='page'><a href="#">1</a></span>
    <span class='page'><a href="#">2</a></span>
    <span class='page'><a href="#">3</a></span>
@stop()