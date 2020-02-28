<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naturale</title>
    <link rel="stylesheet" href="{{ asset('public/css/naturale.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/responsiveslides.css') }}">
    <script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('public/js/naturale.js') }}"></script>
    <script src="{{ asset('public/js/responsiveslides.min.js') }}"></script>
</head>
<body>
    <div id="wrapper">
        <header>
            <div class="head_top">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('public/images/logo.png') }}" alt="Naturale"></a>
                </div>
                <div class="head_rigth">
                    <div class="head_icon">
                        <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                        <a href="https://www.google.com.vn"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                    </div>
                    <div class="login_res">
                        @if(!(Cookie::has('username')))
                            <a href="{{ route('login') }}">Đăng nhập</a> | 
                            <a href="{{ route('register') }}">Đăng ký</a>
                        @else
                            <a>{{ Cookie::get('username') }}</a> | 
                            <a href="{{ route('logout') }}">Đăng xuất</a>
                        @endif
                </div>
            </div>
            <div class="head_bottom">
                <span class="hamburger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></span>
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('product') }}">Sản phẩm</a></li>
                        <li><a href="#">Thời trang</a></li>
                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                </nav>
                <div class="search_cart">
                    <div class="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input type="text" placeholder="Search...">
                    </div>
                    <div class="cart">
                        <a href="{{route('show-cart')}}"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer>
            <div class="top">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li> |
                    <li><a href="{{ route('product') }}">Sản phẩm</a></li> |
                    <li><a href="#">Thời trang</a></li> |
                    <li><a href="{{ route('about') }}">Giới thiệu</a></li> |
                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
            </div>
            <div class="middel">
                <div class="form">
                    <p>Newsletter</p>
                    <form action="">
                        <input type="text" placeholder="Email...">
                        <input type="submit" value="Đăng ký">
                    </form>
                </div>
                <div class="icon">
                    <p>Follow Us</p>
                    <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                    <a href="https://www.google.com.vn"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="bottom">
                <p>© 2017 NATURALE.  Theme by Clean Themes. Ecommerce Software by Shopify</p>
            </div>
        </footer>
    </div>
</body>
</html>