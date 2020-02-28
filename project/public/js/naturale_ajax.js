$(document).ready(function(){
	// Lấy thông tin thành viên
	function fetch_data_user(){
		$.post("../admin/account_user.php", function(data){
			$(".account").html(data);
		});
	}
	// Lấy thông tin quản trị
	function fetch_data_admin(){
		$.post("../admin/account_admin.php", function(data){
			$(".show_ad").html(data);
		});
	}
	// Lấy thông tin sản phẩm
	function fetch_data_product(){
		$.post("../admin/product_admin.php", function(data){
			$(".product_con").html(data);
		})
	}
	//********************************************************************************
	fetch_data_user();
	fetch_data_admin();
	fetch_data_product();
	//********************************************************************************
	// Xóa thành viên
	$(document).on("click", ".del_member", function(){
		var id = $(this).attr("member");
		if(confirm("Bạn có chắc chắn muốn xóa?")){
			$.post("../admin/account_del_user.php", {id_user: id}, function(data){
				fetch_data_user();
			});
		}
	});
	// Xóa quản trị
	$(document).on("click", ".del_admin", function(){
		var id = $(this).attr("admin");
		if(confirm("Bạn có chắc chắn muốn xóa?")){
			$.post("../admin/account_del_admin.php", {id_admin: id}, function(data){
				fetch_data_admin();
			});
		}
	});
	// Thêm quản trị ****************************************************************
	$(document).on("click", ".add_ad", function(){
		var fullname = $(".fullname").val();
		var username = $(".username").val();
		var password = $(".password").val();
		var level = $(".level").val();
		var test = true;
		if(fullname == ""){
			$(".fullEr").html("(*) Nhập họ tên!");
			test = false;
		} else{
			$(".fullEr").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
		}
		if(/^[A-Za-z0-9]{7,32}$/.test(username) == false){
			$(".nameEr").html("(*) Tên gồm 7 ký tự bao gồm chữ hoa, chữ thường và số!");
			test = false;
		} else{
			$(".nameEr").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
		}
		if(password == ""){
			$(".passEr").html("(*) Mật khẩu không được để trống!");
			test = false;
		} else if(password.length<8){
			$(".passEr").html("(*) Mật khẩu phải dài hơn 8 ký tự!");
			test = false;
		} else{
			$(".passEr").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
		}
		if(level == ""){
			$(".levelEr").html("(*) Chọn cấp độ quản lý!");
			test = false;
		} else{
			$(".levelEr").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
		}
		if(test == true){
			$.post("../admin/account_add_admin.php",
				{
					fullname:fullname,
					username:username,
					password:password,
					level:level
				}, function(data){
					$(".nameEr").html(data);
					fetch_data_admin();
			});
			alert("Đã thêm thành công!");
			clearInput();
		}
		return test;
	});
	function clearInput(){
		$(".fullname").val("");
		$(".username").val("");
		$(".password").val("");
		$(".level").val("");
	}
// *************************************************************************************
	// Thêm sản phẩm ***********************************************************************
	$(document).on("click", ".add_pro", function(){
		var file_name1 = $(".file_img1").val();
		var file_name2 = $(".file_img2").val();
		var product_name = $(".product_name").val();
		var product_price = $(".product_price").val();
		var test = true;
		
		var file_data1 = $('.file_img1').prop('files')[0];
		var file_data2 = $('.file_img2').prop('files')[0];

		var form_data = new FormData();
		form_data.append('file1', file_data1);
		form_data.append('file2', file_data2);
		form_data.append('name', product_name);
		form_data.append('price', product_price);

		if(file_name1 == ""){
			$(".imgEr1").html("(*) Chưa ảnh nào được chọn!");
			test = false;
		} else{
			var fsize = $('.file_img1')[0].files[0].size;
			var ftype = $('.file_img1')[0].files[0].type;
			var fname = $('.file_img1')[0].files[0].name;
			var ftype_main = ftype.split("/")[1];
			if(/(jpeg|jpg|gif|png)$/.test(ftype_main) == false){
				$(".imgEr1").html("(*) Ảnh jpg, jpge, png, gif!");
				test = false;
			} else{
				if(fsize > (1024*2000)){
					$(".imgEr1").html("(*) Kích thước ảnh nhỏ hơn 2M!");
					test = false;
				} else{
					$(".imgEr1").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
				}
			}
		}
		if(file_name2 == ""){
			$(".imgEr2").html("(*) Chưa ảnh nào được chọn!");
			test = false;
		} else{
			var fsize = $('.file_img2')[0].files[0].size;
			var ftype = $('.file_img2')[0].files[0].type;
			var fname = $('.file_img2')[0].files[0].name;
			var ftype_main = ftype.split("/")[1];
			if(/(jpeg|jpg|gif|png)$/.test(ftype_main) == false){
				$(".imgEr2").html("(*) Ảnh jpg, jpge, png, gif!");
				test = false;
			} else{
				if(fsize > (1024*2000)){
					$(".imgEr2").html("(*) Kích thước ảnh nhỏ hơn 2M!");
					test = false;
				} else{
					$(".imgEr2").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
				}
			}
		}
		if(product_name == ""){
			$(".pronameEr").html("(*) Tên sản phẩm không được để trống!");
			test = false;
		} else{
			$(".pronameEr").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
		}
		if(product_price == ""){
			$(".propriceEr").html("(*) Giá sản phẩm không được để trống!");
			test = false;
		} else if(isNaN(product_price)){
			$(".propriceEr").html("(*) Giá sản phẩm phải là số!");
			test = false;
		} else{
			$(".propriceEr").html("<i class='fa fa-check-square fa-2x' aria-hidden='true' style='color:#31B404'></i>");
		}
		if(test == true){
			$.ajax({
				url: '../admin/product_add_admin.php',
				dataType : 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(data){
					$(".imgEr1").html(data.er1);
					$(".imgEr2").html(data.er2);
					if(data.success1 !== "OK" && data.success2 !== "OK"){
						fetch_data_product();
						clearProduct();
						alert("Thêm sản phẩm thành công!");
					}
				}
			});
		}
		return test;
	})
	function clearProduct(){
		$(".product_name").val("");
		$(".product_price").val("");
		$(".imgEr1").val("");
		$(".imgEr2").val("");
		$(".propriceEr").val("");
		$(".pronameEr").val("");
		$(".file_img1").val("");
		$(".file_img2").val("");
	}
	// ***************************************************************************************
	// Xóa sản phẩm
	$(document).on("click", ".del_pro", function(){
		var id = $(this).attr("product");
		if(confirm("Bạn có chắc chắn muốn xóa?")){
			$.post("../admin/product_del_admin.php", {id_product: id}, function(data){
				fetch_data_product();
			});
		}
	})
	// Lấy thông tin sản phẩm cần sửa
	$(document).on("click", ".edit_pro", function(){
		$(".add_pro").css("display","none");
		$(".edit_product").css("display","block");
		$(".add_product form").show(100);
		$('html, body').animate({
			scrollTop: $(".add_product form").offset().top
		}, 700);
		var id = $(this).attr("product");

		$(".hidden_id").attr('sess', id);
		
		var form_data = new FormData();
		form_data.append('id', id);
		$.ajax({
			url: '../admin/product_pre_edit_admin.php',
			dataType : 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function(data){
				$(".product_name").val(data.product_name);
				$(".product_price").val(data.product_price);
			}
		});
	})
	// Sửa sản phẩm
	$(document).on("click", ".edit_product", function(){
		var file_name1 = $(".file_img1").val();
		var file_name2 = $(".file_img2").val();
		var product_name = $(".product_name").val();
		var product_price = $(".product_price").val();
		var id_session = $(".hidden_id").attr("sess");
		var test = true;
		
		var file_data1 = $('.file_img1').prop('files')[0];
		var file_data2 = $('.file_img2').prop('files')[0];

		var form_data = new FormData();
		form_data.append('file1', file_data1);
		form_data.append('file2', file_data2);
		form_data.append('name', product_name);
		form_data.append('price', product_price);
		form_data.append('id_session', id_session);

		if(file_name1 == ""){
			$(".imgEr1").html("(*) Chưa ảnh nào được chọn!");
			test = false;
		} else{
			var fsize = $('.file_img1')[0].files[0].size;
			var ftype = $('.file_img1')[0].files[0].type;
			var fname = $('.file_img1')[0].files[0].name;
			var ftype_main = ftype.split("/")[1];
			if(/(jpeg|jpg|gif|png)$/.test(ftype_main) == false){
				$(".imgEr1").html("(*) Ảnh jpg, jpge, png, gif!");
				test = false;
			} else{
				if(fsize > (1024*2000)){
					$(".imgEr1").html("(*) Kích thước ảnh nhỏ hơn 2M!");
					test = false;
				}
			}
		}
		if(file_name2 == ""){
			$(".imgEr2").html("(*) Chưa ảnh nào được chọn!");
			test = false;
		} else{
			var fsize = $('.file_img2')[0].files[0].size;
			var ftype = $('.file_img2')[0].files[0].type;
			var fname = $('.file_img2')[0].files[0].name;
			var ftype_main = ftype.split("/")[1];
			if(/(jpeg|jpg|gif|png)$/.test(ftype_main) == false){
				$(".imgEr2").html("(*) Ảnh jpg, jpge, png, gif!");
				test = false;
			} else{
				if(fsize > (1024*2000)){
					$(".imgEr2").html("(*) Kích thước ảnh nhỏ hơn 2M!");
					test = false;
				}
			}
		}
		if(product_name == ""){
			$(".pronameEr").html("(*) Tên sản phẩm không được để trống!");
			test = false;
		}
		if(product_price == ""){
			$(".propriceEr").html("(*) Giá sản phẩm không được để trống!");
			test = false;
		} else if(isNaN(product_price)){
			$(".propriceEr").html("(*) Giá sản phẩm phải là số!");
			test = false;
		}
		if(test == true){
			$.ajax({
				url: '../admin/product_edit_admin.php',
				dataType : 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(data){
					$(".imgEr1").html(data.er1);
					$(".imgEr2").html(data.er2);
					if(data.success1 !== "OK" && data.success2 !== "OK"){
						fetch_data_product();
						clearProduct();
						alert("Sửa sản phẩm thành công!");
					}
				}
			});
		}
		return test;
	})
//********************************************************************************************************* */
	// Bài viết ***************************************************************************************
	$(document).on("click", ".add_news", function(){
		var title = $(".title_news").val();
		var des = $(".des_news").val();
		var content = CKEDITOR.instances['content_news'].getData();
		var test = true;
		if(title == ""){
			$(".titleEr").html("(*) Tiêu đề không được để trống");
			test = false;
		}
		if(des == ""){
			$(".desEr").html("(*) Miêu tả không được để trống");
			test = false;
		}
		if(content == ""){
			$(".contentEr").html("(*) Nội dung không được để trống");
			test = false;
		}
		var file_name1 = $(".file_news").val();
		
		var file_data1 = $('.file_news').prop('files')[0];

		var form_data = new FormData();
		form_data.append('file1', file_data1);
		form_data.append('title', title);
		form_data.append('des', des);
		form_data.append('content', content);

		if(file_name1 == ""){
			$(".fileEr").html("(*) Chưa ảnh nào được chọn!");
			test = false;
		} else{
			var fsize = $('.file_news')[0].files[0].size;
			var ftype = $('.file_news')[0].files[0].type;
			var fname = $('.file_news')[0].files[0].name;
			var ftype_main = ftype.split("/")[1];
			if(/(jpeg|jpg|gif|png)$/.test(ftype_main) == false){
				$(".fileEr").html("(*) Ảnh jpg, jpge, png, gif!");
				test = false;
			} else{
				if(fsize > (1024*2000)){
					$(".fileEr").html("(*) Kích thước ảnh nhỏ hơn 2M!");
					test = false;
				}
			}
		}
		if(test == true){
			$.ajax({
				url: '../admin/news_add.php',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function(data){
					$(".title_news").val("");
					$(".des_news").val("");
					CKEDITOR.instances['content_news'].setData('');
					$(".file_news").val("");
					alert("Đăng bài viết thành công!");
				}
			});
		}
		return test;
	})
	// Danh sách bài viết
	function fetch_data_news(){
		$.post("../admin/news_getlist.php", function(data){
			$(".news_list").html(data);
		});
	}
	fetch_data_news();
	// Xóa bài viết
	$(document).on("click", ".del_news", function(){
		var id = $(this).attr("news");
		if(confirm("Bạn có chắc chắn muốn xóa?")){
			$.post("../admin/news_del.php", {id_news: id}, function(data){
				fetch_data_news();
			});
		}
	})
// ******************************************************************************
	// Đơn hàng
	function fetch_data_order(){
		$.post("../admin/order_list.php", function(data){
			$(".order_admin").html(data);
		});
	}
	fetch_data_order()

})