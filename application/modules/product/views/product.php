<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/news.css">
<div class=" bg-white">
	<h2 class="text-uppercase"><?php echo $title?></h2>
	<hr>
	<a href="<?php echo base_url()?>" class="">Home</a> 
	<hr>

	<div class="news-form">
		<?php foreach ($list_product as $key => $value) {?>
			<div class="item">
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url().'uploads/product/thumbs/'.$value['image']?>">
				</div>
				<div class="col-md-8">
					<a href="<?php echo base_url().'nissan/'.$value['slug']?>"><h4 class="text-uppercase"><?php echo $value['title']?></h4></a>
					<p><?php echo $value['description'] ?></p>
					<a href="<?php echo base_url().'nissan/'.$value['slug']?>" class="text-uppercase more pull-right">Chi tiết</a>
				</div>
				
			</div>
		<?php }
		?>
	</div>
	<div class="clearfix"></div>
</div>