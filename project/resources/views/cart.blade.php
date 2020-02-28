@extends('master')
@section('content')
    <div class="tit">
        <span>Trang chủ <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Giỏ hàng</span>
    </div>
    <div class="show_cart">
        @if(count($content))
        <table cellspacing="0">
            <tr>
                <th></th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
            @foreach($content as $r)
                <tr>
                    <td><img src="{{asset('public/images/product/'.$r->options->img)}}"></td>
                    <td>{{$r->name}}</td>
                    <td>{{number_format($r->price)}} đ</td>
                    <td><a href="{{route('decrease', $r->id)}}"><i class='fa fa-minus-square-o fa-2x' aria-hidden='true'></i></a><span>{{$r->qty}}</span><a href="{{route('increment', $r->id)}}"><i class='fa fa-plus-square-o fa-2x' aria-hidden='true'></i></a></td>
                    <td>{{number_format($r->total)}} đ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">
                    Tổng : <span>{{$total}}</span> đ
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <a class='empty'>Xóa giỏ hàng</a>
                    <a href="">Thanh toán</a>
                </td>
            </tr>
        </table>
        @else
        <div class='alert_cart' style='text-align:center;padding: 100px;'>
            <h3 style='color:#424242;'>Bạn chưa có sản phẩm nào !</h3>
        </div>
        @endif
    </div>
    <div class="alert">
		<p>Bạn có chắc chắn muốn xóa giỏ hàng!</p>
		<a href="{{route('remove-cart')}}">Xóa</a>
		<a class="cancel">Không</a>
	</div>
@stop()