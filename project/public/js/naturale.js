$(document).ready(function(){
	$(".item_menu:nth-child(5)").click(function(){
		$(".sub_menu").fadeToggle(100);
	});

// Hàm lấy thời gian
	function time() {
		var today = new Date();
		var weekday=new Array(7);
		weekday[0]="Chủ Nhật";
		weekday[1]="Thứ 2";
		weekday[2]="Thứ 3";
		weekday[3]="Thứ 4";
		weekday[4]="Thứ 5";
		weekday[5]="Thứ 6";
		weekday[6]="Thứ 7";
		var day = weekday[today.getDay()];
		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		nowTime = h+":"+m+":"+s;
		if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;
	 
		tmp='<span class="date">'+today+' | '+nowTime+'</span>';
	 
		$(".clock").html(tmp);
		function checkTime(i){
			if(i<10) i="0" + i;
			return i;
		}
	}
	function clocktime(){
		setTimeout(function(){
			time();
			clocktime();
		},1000);
	}
	clocktime();
// ************************************
	// Slider
	$(function(){
		$("#slider4").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			before: function () {
			  $('.events').append("<li>before event fired.</li>");
			},
			after: function () {
			  $('.events').append("<li>after event fired.</li>");
			}
		  });
	})
// ***********************************
	// Menu
	$(".hamburger").click(function(){
		$(".head_bottom nav").fadeToggle(200);
	})
// ***********************************
	// Xóa giỏ hàng
	$(".empty").click(function(){
		$(".alert").css("display","block");
	})
	$(".cancel").click(function(){
		$(".alert").css("display","none");
	})
})