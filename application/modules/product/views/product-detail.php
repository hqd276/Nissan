<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/product.css">
<div class="row">
	<div class="bg-white col-sx-12 product-detail">
		<h1 class="text-uppercase"><strong><?php echo $item['title']?></strong> </h1>
		<p class="product-price">
			GIÁ BÁN LẺ ĐỀ XUẤT (ĐÃ BAO GỒM 10% VAT)<br>
			<span><?php echo number_format($item['price'])?></span> VND
		</p>
		<hr>
		<img class="img-responsive col-sx-8 col-sx-offset-2" src="<?php echo base_url().'uploads/product/'.$item['image']?>">		
		<hr>
		<div class="clearfix"></div>
		<div class="version-block">
			<h3 class="text-uppercase section-title">Phiên bản</h3>
			<div class="row">
			<?php if ($item['versions']){
				foreach ($item['versions'] as $key => $value) {?>
				<div class="col-sx-4 ">
					<div class="version">
						<h3 class="title-v"><?php echo $value['title']?></h3>
						<p class="price-v"><?php echo number_format($value['price'])?> VND <span>Giá (Bao gồm 10% VAT)</span></p>
						<div class="detail-v">
							<?php echo $value['detail']?>
						</div>
					</div>
				</div>
			<?php }
			}?>
			</div>
		</div>

		<?php if ($item['furnitures']) {?>
		<div class="clearfix"></div>
		<div class="furniture-block">
			<h3 class="text-uppercase section-title">Nội thất</h3>
			<div class="">
				<div id="carousel-furniture" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php foreach ($item['furnitures'] as $key => $value){?>
				  	<div class="item <?php echo ($key==0)?"active":"" ?>" >
				    	<img style="width:100%" src="<?php echo base_url("uploads/product-furniture/".$value); ?>">
				    	<div class="carousel-caption">
				        	
				      	</div>
				    </div>
				   	<?php } ?>
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-furniture" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-furniture" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
		<?php }?>

		<?php if ($item['exteriors']) {?>
		<div class="clearfix"></div>
		<div class="exterior-block">
			<h3 class="text-uppercase section-title">Ngoại thất</h3>
			<div class="">
				<div id="carousel-exterior" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php foreach ($item['exteriors'] as $key => $value){?>
				  	<div class="item <?php echo ($key==0)?"active":"" ?>" >
				    	<img style="width:100%" src="<?php echo base_url("uploads/product-exterior/".$value); ?>">
				    	<div class="carousel-caption">
				        	
				      	</div>
				    </div>
				   	<?php } ?>
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-exterior" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-exterior" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
		<?php }?>

		<?php if($item['video']) {?>
		<div class="clearfix"></div>
		<div class="exterior-block">
			<h3 class="text-uppercase section-title">Video</h3>
			<div class="video-container">
			<iframe class="video" width="100%" height="675px" src="https://www.youtube.com/embed/<?php echo $item['video']?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<?php }?>
		
		<div class="">
			<!-- <p class="description"><i><strong> <?php echo $item['description']?></strong></i></p>
			<hr> -->
			
	        <div class="detail" id="detail"><?php echo $item['detail']?></div>
			<hr>
			<span class="glyphicon glyphicon-tags"></span> <?php echo $item['tag']?> 
			<!-- <span class="glyphicon glyphicon-pencil"></span><?php echo date("d/m/Y",$item['created'])?> --> 
			<hr>

		</div>
		<div class="clearfix"></div>
	</div>
</div>