<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin</title>
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/font-awesome.css') }}">
<script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('public/js/naturale.js') }}"></script>
</head>
<body>
    <div class="wrapper">
		<div class="header">
			<div class="logo">
				<a href="{{ route('home') }}"><img src="{{ asset('public/images/logo_admin.png') }}" alt="Naturale"></a>
			</div>
			<div class="clock"></div>
			<div class="login">
				<span>CTYoung</span>
				<i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
				<a href="#"><i class="fa fa-power-off fa-lg" style="color:#ff0000;" aria-hidden="true"></i></a>
			</div>
		</div>
		<section class="home">
			<div class="menu">
				<div class="item_menu">
					<a href="{{ route('home_ad') }}"><span>Danh mục</span></a>
				</div>
				<div class="item_menu">
					<a href="#"><i class="fa fa-users" aria-hidden="true"></i>Tài khoản</a>
				</div>
				<div class="item_menu">
					<a href="{{ route('product_ad') }}"><i class="fa fa-th" aria-hidden="true"></i>Sản phẩm</a>
				</div>
				<div class="item_menu">
					<a href="#"><i class="fa fa-truck" aria-hidden="true"></i>Đơn hàng</a>
				</div>
				<div class="item_menu">
					<a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>Bài viết<i class="fa fa-caret-down" aria-hidden="true"></i></a>
				</div>
				<div class="sub_menu">
					<a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Thêm bài viết</a>
					<a href="#"><i class="fa fa-list" aria-hidden="true"></i>Danh sách bài viết</a>
				</div>
			</div>
		</section>
		<section class="container">

			@yield('content_admin')

			<div class="statis">
					<table cellspacing="0">
						<tr>
							<td colspan="2"><i class="fa fa-line-chart" aria-hidden="true"></i>Thống kê</td>
						</tr>
						<tr>
							<td>Sản phẩm</td>
							<td><span>1346</span></td>
						</tr>
						<tr>
							<td>Bài viết</td>
							<td><span>2789</span></td>
						</tr>
						<tr>
							<td>Đơn hàng</td>
							<td><span>912</span></td>
						</tr>
						<tr>
							<td>Thành viên</td>
							<td><span>2000</span></td>
						</tr>
					</table>
				</div>
        </section>
        <footer>
            <p>&copy; CTYoung 2017</p>
        </footer>
    </div>
</body>
</html>