<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/home.css">
<div class=" container">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	  	<?php foreach ($banners as $key => $value){?>
	  	<div class="item <?php echo ($key==0)?"active":"" ?>" >
	    	<img src="<?php echo base_url("uploads/banner/".$value['image']); ?>">
	    	<div class="carousel-caption">
	        	
	      	</div>
	    </div>
	   	<?php } ?>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

	<div class="content-home  text-center">
			<div class="col-sm-3 hot-product">
				<span class="top text-uppercase"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Sản phẩm bán chạy</span>

				<div id="myCarousel" class="carousel slide vertical">
		            <!-- Carousel items -->
		            <div class="carousel-inner">
			            <?php foreach ($products as $key => $value) {?>
				            <div class="item <?php if($key==0) echo 'active'?>">
				            	<a href="<?php echo base_url('/nissan/'.$value['slug'])?>">
				            		<img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
				                    <div class="pro-title"><?php echo $value['title']?></div>
									<!-- <div class="pro-price"><?php echo $value['price']?> VND</div> -->
				            	</a>
			                </div>
	            		<?php }?>
		            </div>
		            <!-- Carousel nav -->
		            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
		            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
	            </div>
			</div>
			<div class="col-sm-9 new-product">
				<span class="top text-uppercase"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Sản phẩm mới</span>
				<ul class="list-unstyled text-left">
					<?php foreach ($products as $key => $value) {?>
            			<li class="">
							<a class="pro-img" href="<?php echo base_url('/nissan/'.$value['slug'])?>">
								<img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
							</a>
							
							<div class="pro-title"><?php echo $value['title']?></div>
							<div class="pro-price"><?php echo $value['price']?> VND</div>
							<a class="pull-right view-detail" href="<?php echo base_url('/nissan/'.$value['slug'])?>">
								Chi tiết
							</a>
								<!-- <p class="pro-tech">
									<?php echo $value['description']?>
								</p> -->
							
						</li>
            		<?php }?>
				</ul>
			</div>
	</div>
</div>
<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 3000
	})
</script>

<div class="clearfix"></div>