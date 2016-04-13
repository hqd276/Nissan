<!-- <a class="banner-hoz left hidden-xs" href=""><img src="<?php echo base_url('/assets/images/h-banner1.jpg')?>"></a>
<a class="banner-hoz right hidden-xs" href=""><img src="<?php echo base_url('/assets/images/h-banner2.jpg')?>"></a>
 -->
<div class="header text-center navbar-fixed-top">
	<div class="container hidden-xs">
		<div class="col-sm-2 logo">
			<a href="/"><img src="<?php echo base_url('/assets/images/logo.png')?>"></a>
		</div>
		<div class="col-sm-10 banner">
			<img class="pull-left" src="<?php echo base_url('/assets/images/banner.png')?>">

			<div class="pull-right text-uppercase">
				<h4>Xuân Kiên - Đại diện kinh doanh</h4>
				<div class="hotline"><strong> Hotline: 0902.902.555 </strong></div>
			</div>
		</div>
	</div>
	
	<nav id="navbar" class="navbar navbar-default ">
		<div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button> -->
		      <a class="navbar-brand visible-xs" href="#"><img src="<?php echo base_url('/assets/images/logo.png')?>"></a>
		      	<div class="pull-right text-uppercase visible-xs">
					<h4>Xuân Kiên</h4>
					<div class="hotline"><strong> Hotline: 0902.902.555 </strong></div>
				</div>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
		    <div class="" id="bs-example-navbar-collapse-1">
		    <strong>
		      <ul class="nav navbar-nav text-uppercase pull-right">
		        <li class=""><a class="dropdown-toggle" href="/">Trang chủ <span class="sr-only">(current)</span></a></li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Giới thiệu <span class="caret"></span></a>
		          	<ul class="dropdown-menu" role="menu">
		          		<?php foreach ($abouts as $key => $value) {?>
		          			<li><a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>"><?php echo $value['title']?></a></li>
		          		<?php }?>
		          	</ul>
		      	</li>
		        <li class="dropdown dropdown-product hidden-xs">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sản phẩm <span class="caret"></span></a>
	            	<ul class="dropdown-menu list-unstyled text-left list-product-header">
	            		<?php foreach ($products as $key => $value) {?>
	            			<li class="">
								<a href="<?php echo base_url('/nissan/'.$value['slug'])?>">
									<div class="pro-title"><?php echo $value['title']?></div>
									<div class="pro-price"><?php echo number_format($value['price'])?> VND</div>
									<img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
									<div class="pro-tech">
										<?php echo $value['description']?>
									</div>
								</a>
							</li>
	            		<?php }?>
					</ul>
		        </li>
		        <li class="dropdown visible-xs">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sản phẩm <span class="caret"></span></a>
	            	<ul class="dropdown-menu">
	            		<?php foreach ($products as $key => $value) {?>
	            			<li class="">
								<a href="<?php echo base_url('/nissan/'.$value['slug'])?>">
									<div class="pro-title"><?php echo $value['title']?></div>
								</a>
							</li>
	            		<?php }?>
					</ul>
		        </li>
		        <li class="dropdown">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tư vấn mua xe <span class="caret"></span></a>
		          	<ul class="dropdown-menu" role="menu">
		          		<?php foreach ($consult as $key => $value) {?>
		          			<li><a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>"><?php echo $value['title']?></a></li>
		          		<?php }?>
		          		<li><a href="<?php echo base_url('du-toan-chi-phi')?>">Dự toán chi phí</a></li>
		          		<li><a href="<?php echo base_url('dang-ki-lai-thu')?>">Đăng kí lái thử</a></li>
		          		<li><a href="<?php echo base_url('ban-do-showroom')?>">Tìm đường đi</a></li>
		          	</ul>
		        </li>
		        <li class="dropdown">
		          	<a class="dropdown-toggle" href="<?php echo base_url().'tra-gop'?>" role="button" aria-expanded="false">Trả góp </a>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tin tức <span class="caret"></span></a>
		          	<ul class="dropdown-menu" role="menu">
		          		<?php foreach ($cat_news as $key => $value) {?>
		          			<li><a href="<?php echo base_url().'danh-muc/'.$value['slug']?>"><?php echo $value['name']?></a></li>
		          		<?php }?>
		          	</ul>
		      	</li>
		        <li class="last"><a class="dropdown-toggle" href="<?php echo base_url('contact')?>">Liên hệ</a></li>
		      </ul>
		    </strong>
		    </div><!-- /.navbar-collapse -->
	    </div>
	</nav>
	<div class="clearfix"></div>
</div>

<script type="text/javascript">
// var windowScrollTop = function () {
//     return window.pageYOffset;
// };

// var Menu = (function (scrollOffset) {
//     var Menu = function () {
//         this.element = document.getElementById('navbar');
//         this.docked = false;
//         this.initialOffsetTop = 0;

//         this.resetInitialOffsetTop();
//     }

//     Menu.prototype = {
//         offsetTop: function () {
//             return this.element.offsetTop;
//         },
//         resetInitialOffsetTop: function () {
//             this.initialOffsetTop = this.offsetTop();
//         },

//         dock: function () {
//             this.element.className = 'docked';
//             this.docked = true;
//         },
//         undock: function () {
//             this.element.className = this.element.className.replace('docked', '');
//             this.docked = false;
//         },

//         toggleDock: function () {
//             if (this.docked === false && (this.offsetTop() - scrollOffset() < 0)) {
//                 this.dock();
//             } else if (this.docked === true && (scrollOffset() <= this.initialOffsetTop)) {
//                 this.undock();
//             }
//         }
//     };

//     return Menu;
// })(windowScrollTop);


// var menu = new Menu();


// window.onscroll = function () {
//     menu.toggleDock();
// };

// var updateMenuTop = function () {
//     // Shortly dock to reset the initial Y-offset
//     menu.undock();
//     menu.resetInitialOffsetTop();

//     // If appropriate, undock again based on the new value
//     menu.toggleDock();
// };

// var zoomListeners = [updateMenuTop];

// (function () {
//     var w = window,
//         d = document,
//         e = d.documentElement,
//         g = d.getElementsByTagName('body')[0];

//     var lastWidth = 0;

//     function pollZoomFireEvent() {
//         var widthNow = w.innerWidth || e.clientWidth || g.clientWidth;

//         if (lastWidth == widthNow) {
//             return;
//         }

//         lastWidth = widthNow;

//         // Length changed, user must have zoomed, invoke listeners.
//         for (i = zoomListeners.length - 1; i >= 0; --i) {
//             zoomListeners[i]();
//         }
//     }

//     setInterval(pollZoomFireEvent, 100);
// })();
</script>
<style type="text/css">
/*#navbar.docked .nav{
	margin: 0 auto;
}
#navbar.docked {
	z-index: 100;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.6);
}
#navbar.docked a.dropdown-toggle {
    color: #fff;
}
#navbar.docked .nav-item a:hover {
    background-color: rgba(0, 0, 0, 0.3);
}
#navbar.docked .navbar-header {
	height: auto;
}*/
</style>