@extends('master')
@section('content')
    <section class="container_slide">
        <div class="callbacks_container">
            <ul class="rslides" id="slider4">
                <li><img src="{{ asset('public/images/slide1.jpg') }}" alt=""></li>
                <li><img src="{{ asset('public/images/slide2.jpg') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <section class="container_main">
        <aside class="news">
            <div class="sales">
                <p><img src="{{ asset('public/images/sale17.png') }}" alt=""></p>
                <p><img src="{{ asset('public/images/sale20.jpg') }}" alt=""></p>
            </div>
            <div class="about">
                <h2>Về chúng tôi</h2>
                <p>Thương hiệu thời trang NATURALE, trực thuộc công ty TNHH SX-TM Nét Việt chính thức ra mắt những người yêu mến thời trang vào năm 2006. Buổi ban đầu, NATURALE được các bạn trẻ biết đến với dòng sản phẩm áo sơ mi kiểu với nhiều kiểu dáng và màu sắc tươi sáng, trẻ trung.</p>
                <a href="?action=about">Xem thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="news_item">
                <h2>Thời trang</h2>
                <div class="item_detail">
                    <a href="#"><img src="{{ asset('public/images/slide2.jpg') }}" alt=""></a>
                    <a href="#" class="title">Những bộ trang phục cuối năm của bạn trông như thế nào?</a>
                    <p>Vì gần về cuối năm, là thời gian các bạn gái muốn khoác lên mình những bộ trang phục trông thật bắt mắt và lộng lẫy. Đồng thời là thời gian đúng lúc để các bạn cần update thêm nhiều xu hướng hoặc thay đổi vài thể loại quần áo khác nhau.</p>
                    <a href="?action=about">Xem thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="item_detail">
                    <a href="#"><img src="{{ asset('public/images/slide1.jpg') }}" alt=""></a>
                    <a href="#" class="title">Những bộ trang phục cuối năm của bạn trông như thế nào?</a>
                    <p>Vì gần về cuối năm, là thời gian các bạn gái muốn khoác lên mình những bộ trang phục trông thật bắt mắt và lộng lẫy. Đồng thời là thời gian đúng lúc để các bạn cần update thêm nhiều xu hướng hoặc thay đổi vài thể loại quần áo khác nhau.</p>
                    <a href="?action=about">Xem thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </aside>
        <article class="content">
            <div class="product">
                @foreach($data as $r)
                    <div class="item">
                        <a href="{{ route('product-detail', $r->id) }}">
                            <img src="{{ asset('public/images/product/'.$r->product_img1) }}">
                            <img src="{{ asset('public/images/product/'.$r->product_img2) }}">
                        </a>
                        <div class='pro_info'>
                            <p>{{ $r->product_name }}</p>
                            <p>{{ $r->product_price }} đ</p>
                            <a href="{{route('add-cart', $r->id, $r->product_name)}}" class='add_cart'>Thêm vào giỏ</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="follow">
                <h2>Follow Us</h2>
                <a href="#">
                    <div class="follow_img">
                        <img src="{{ asset('public/images/fol1.jpg') }}">
                        <img src="{{ asset('public/images/fol5.jpg') }}">
                        <img src="{{ asset('public/images/fol4.jpg') }}">
                        <img src="{{ asset('public/images/fol3.jpg') }}">
                    </div>
                </a>
            </div>
        </article>
    </section>
@stop()