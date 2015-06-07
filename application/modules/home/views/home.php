<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/home.css">
<div class=" container">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="<?php echo base_url('/assets/images/slider/0.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php echo base_url('/assets/images/slider/1.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php echo base_url('/assets/images/slider/2.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php echo base_url('/assets/images/slider/3.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php echo base_url('/assets/images/slider/4.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php echo base_url('/assets/images/slider/5.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php echo base_url('/assets/images/slider/6.jpg')?>" alt="...">
	      <div class="carousel-caption">
	      </div>
	    </div>
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
			                    <img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
			                    <div class="pro-title"><?php echo $value['title']?></div>
								<div class="pro-price"><?php echo $value['price']?> VND</div>
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
							<a href="">
								<div class="pro-title"><?php echo $value['title']?></div>
								<div class="pro-price"><?php echo $value['price']?> VND</div>
								<img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
								<p class="pro-tech">
									<?php echo $value['description']?>
								</p>
							</a>
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