<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/product.css">
<div class="row">
	<div class="bg-white col-sm-12 product-detail">
		<h1 class="text-uppercase"><strong><?php echo $item['title']?></strong> </h1>
		<p class="product-price">
			GIÁ BÁN LẺ ĐỀ XUẤT (ĐÃ BAO GỒM 10% VAT)<br>
			<span><?php echo number_format($item['price'])?></span> VND
		</p>
		<hr>
		<img class="img-responsive col-sm-8 col-sm-offset-2" src="<?php echo base_url().'uploads/product/'.$item['image']?>">		
		<hr>
		<div class="clearfix"></div>
		<div class="version-block">
			<h3 class="text-uppercase section-title">Phiên bản</h3>
			<div class="row">
			<?php if ($item['versions']){
				foreach ($item['versions'] as $key => $value) {?>
				<div class="col-sm-4 ">
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