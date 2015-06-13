<!-- <a class="banner-hoz left hidden-xs" href=""><img src="<?php echo base_url('/assets/images/h-banner1.jpg')?>"></a>
<a class="banner-hoz right hidden-xs" href=""><img src="<?php echo base_url('/assets/images/h-banner2.jpg')?>"></a>
 -->
<div class="header text-center container">
	<div class="hidden-xs">
		<div class="col-sm-2 logo">
			<a href="/"><img src="<?php echo base_url('/assets/images/logo.png')?>"></a>
		</div>
		<div class="col-sm-10 banner">
			<img class="pull-left" src="<?php echo base_url('/assets/images/banner.png')?>">

			<img class="pull-right" src="<?php echo base_url('/assets/images/hotline.png')?>">
		</div>
	</div>
	
	<nav class="navbar navbar-default">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand visible-xs" href="#"><img src="<?php echo base_url('/assets/images/nissan-logo.png')?>"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <strong>
	      <ul class="nav navbar-nav text-uppercase pull-right">
	        <li class=""><a href="/">Trang chủ <span class="sr-only">(current)</span></a></li>
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
								<div class="pro-price"><?php echo $value['price']?> VND</div>
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
	          	</ul>
	        </li>
	        <li class="dropdown">
	          	<a href="<?php echo base_url().'tra-gop'?>" role="button" aria-expanded="false">Trả góp </a>
	        </li>
	        <li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tin tức <span class="caret"></span></a>
	          	<ul class="dropdown-menu" role="menu">
	          		<?php foreach ($cat_news as $key => $value) {?>
	          			<li><a href="<?php echo base_url().'danh-muc/'.$value['slug']?>"><?php echo $value['name']?></a></li>
	          		<?php }?>
	          	</ul>
	      	</li>
	        <li class="last"><a href="<?php echo base_url('contact')?>">Liên hệ</a></li>
	      </ul>
	    </strong>
	    </div><!-- /.navbar-collapse -->
	</nav>
	<div class="clearfix"></div>
</div>