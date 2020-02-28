@extends('admin.home')
@section('content_admin')
    <div class="product">
        <div class="show_product">
            <p><i class="fa fa-th" aria-hidden="true"></i>Sản phẩm</p>
            <div class="show_detail product_con">
                <table cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Mã sản phẩm</th>
                        <th>Giá</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    @foreach($data as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td><img style="width:50px;height:50px;" src="{{ asset('public/images/product/'.$r->product_img1) }}"</td>
                        <td>{{ $r->product_name }}</td>
                        <td>{{ $r->product_code }}</td>
                        <td>{{ number_format($r->product_price) }} đ</td>
                        <td><a href="{{ route('get-edit-product', $r->id) }}"><i class="fa fa-pencil edit_pro" product="id" aria-hidden='true'></i></a></td>
                        <td><a href="{{ route('del-product', $r->id) }}"><i class='fa fa-times del_pro' product="id" aria-hidden='true'></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="add_product">
            <a href="{{ route('get-insert-product') }}"><i class="fa fa-plus-square fa-3x" aria-hidden="true"></i></a>
        </div>
        </div>
@stop()