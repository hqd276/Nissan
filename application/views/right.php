<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/right.css">
<div class="hot_news">
	<h4 class="text-center text-uppercase">Đừng bỏ lỡ</h4>
	<ul class="list-unstyled">
	<?php foreach ($hot_news as $key => $value) {?>
		<li>
			<a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>">
				<img class="pull-right" src="<?php echo base_url().'uploads/news/thumbs/'.$value['image']?>">
				<?php echo $value['title']?>
			</a>
		</li>
	<?php }?>
	</ul>
</div>

<div class="hot_news">
	<h4 class="text-center text-uppercase">Đọc nhiều nhất</h4>
	<ul class="list-unstyled">
	<?php foreach ($top_views_news as $key => $value) {?>
		<li>
			<a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>">
				<img class="pull-right" src="<?php echo base_url().'uploads/news/thumbs/'.$value['image']?>">
				<?php echo $value['title']?>
			</a>
		</li>
	<?php }?>
	</ul>
</div>

<img class="adv-right" src="<?php echo base_url('/assets/images/qc2.jpg')?>">