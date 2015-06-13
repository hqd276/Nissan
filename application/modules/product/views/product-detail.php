<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/product.css">
<div class="row">
	<div class="bg-white col-sm-10 col-sm-offset-1 product-detail">
		<h3 class="text-uppercase"><strong><?php echo $item['title']?></strong> </h3>
		<hr>

		<div class="">
			<!-- <p class="description"><i><strong> <?php echo $item['description']?></strong></i></p>
			<hr> -->
			<img class="img-responsive col-md-12" src="<?php echo base_url().'uploads/product/'.$item['image']?>">		
			<hr>
	        <div class="detail" id="detail"><?php echo $item['detail']?></div>
			<hr>
			<span class="glyphicon glyphicon-tags"></span> <?php echo $item['tag']?> 
			<!-- <span class="glyphicon glyphicon-pencil"></span><?php echo date("d/m/Y",$item['created'])?> --> 
			<hr>

		</div>
		<div class="clearfix"></div>
	</div>
</div>