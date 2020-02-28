@extends('admin.home')
@section('content_admin')
    <div class="product">
        <div class="add_product">
            <form action="{{ route('insert-product') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <table cellspacing="0">
                    <tr>
                        <td colspan="2">Thêm sản phẩm</td>
                    </tr>
                    <tr>
                        <td colspan="2">Tên sản phẩm</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="product_name" name="product_name" id="product_name" value="{{ old('product_name') }}"></td>
                        <td>
                            @if($errors->has('product_name'))
                                <p class="err">{{ $errors->first('product_name') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Giá sản phẩm</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="product_price" name="product_price" id="product_price" value="{{ old('product_price') }}"></td>
                        <td>
                            @if($errors->has('product_price'))
                                <p class="err">{{ $errors->first('product_price') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Mã sản phẩm</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="product_code" name="product_code" id="product_code" value="{{ old('product_code') }}"></td>
                        <td>
                            @if($errors->has('product_code'))
                                <p class="err">{{ $errors->first('product_code') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Hình ảnh 1</td>
                    </tr>
                    <tr>
                        <td><input type="file" class="file_img1" name="img1" id="file" value="{{ old('img1') }}"></td>
                        <td>
                            @if($errors->has('img1'))
                                <p class="err">{{ $errors->first('img1') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Hình ảnh 2</td>
                    </tr>
                    <tr>
                        <td><input type="file" class="file_img2" name="img2" id="file" value="{{ old('img2') }}"></td>
                        <td>
                            @if($errors->has('img2'))
                                <p class="err">{{ $errors->first('img2') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="add_pro" name="add_product" value="Thêm">
                            {{--  <input type="submit" class="edit_product" name="edit_product" value="Sửa">
                            <input hidden type="text" class="hidden_id">  --}}
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@stop()