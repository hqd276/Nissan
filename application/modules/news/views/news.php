<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/news.css">
<div class=" bg-white">
	<h2 class="text-uppercase"><?php echo $title?></h2>
	<hr>
	<a href="<?php echo base_url()?>" class="">Home</a> / <a href="<?php echo base_url().'danh-muc/'. $cat['slug']?>"><?php echo $cat['name']?></a>
	<hr>
	<div class="news-form">
		<?php foreach ($list_news as $key => $value) {?>
			<div class="item">
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo base_url().'uploads/news/'.$value['image']?>">
				</div>
				<div class="col-md-8">
					<a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>"><h4 class="text-uppercase"><?php echo $value['title']?></h4></a>
					<p><?php echo split_char($value['description'],150,1)." ..."?></p>
					<a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>" class="text-uppercase more pull-right">More</a>
				</div>
				
			</div>
		<?php }
		?>
	</div>
	
	<div class="clearfix"></div>
</div>