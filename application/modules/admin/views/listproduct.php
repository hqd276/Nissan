<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">List product</h2>
	<a href="<?php echo base_url('/admin/product/add/'.$type)?>" class="btn btn-default pull-right"> Add new product </a>
	
	<table class="table table-bordered table-hover">
		<thead>
			<th>Id</th>
			<th>Image</th>
			<th>Title</th>
			<th>Category</th>
			<th>Hot</th>
			<th>Home</th>
			<th>Views</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php if(count($list)>0){ ?>
			<?php foreach($list as $item) {?>
			<tr>
				<td><?php echo $item["id"]?></td>
				<td><img style="width:150px;" src="<?php echo base_url().'uploads/product/thumbs/'.$item['image']?>"></td>
				<td><?php echo $item["title"]?></td>
				<td><?php echo $item["category"]?></td>
				<td><?php echo $item["hot_product"]?></td>
				<td><?php echo $item["home_product"]?></td>
				<td><?php echo $item["views"]?></td>
				<td><?php echo $item["status"]?></td>
				<td>
					<a href="#" onclick="confirmClick('<?php echo base_url('/admin/product/delete/'.$type.'/'.$item["id"])?>')"  class="btn btn-default"> Delete </a>
					<a href="<?php echo base_url("/admin/product/edit/".$item["id"]);?>" class="btn btn-default"> Edit </a>
				</td>
			</tr>
			<?php }?>
		<?php }else{?>
			<tr>
				<td class="text-center" colspan="9">Don't have any Item!</td>
			</tr>
		<?php }?>
		</tbody>
	</table>
	<nav>
	  <ul class="pager">
	    <li class="previous <?php if(!$older_link) echo 'disabled'?>"><a href="<?php echo $older_link?>"><span aria-hidden="true">&larr;</span> Older</a></li>
	    <li class="next <?php if(!$newer_link) echo 'disabled'?>"><a href="<?php echo $newer_link?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
	  </ul>
	</nav>
</div>
		