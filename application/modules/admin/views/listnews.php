<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">List News</h2>
	<a href="<?php echo base_url('/admin/news/add/'.$type)?>" class="btn btn-default pull-right"> Add new News </a>
	
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
				<td><img style="width:150px;" src="<?php echo base_url().'uploads/news/thumbs/'.$item['image']?>"></td>
				<td><?php echo $item["title"]?></td>
				<td><?php echo $item["category"]?></td>
				<td><?php echo $item["hot_news"]?></td>
				<td><?php echo $item["home_news"]?></td>
				<td><?php echo $item["views"]?></td>
				<td><?php echo $item["status"]?></td>
				<td>
					<a href="#" onclick="confirmClick('<?php echo base_url('/admin/news/delete/'.$type.'/'.$item["id"])?>')"  class="btn btn-default"> Delete </a>
					<a href="<?php echo base_url("/admin/news/edit/".$type."/".$item["id"]);?>" class="btn btn-default"> Edit </a>
				</td>
			</tr>
			<?php }?>
		<?php }else{?>
			<tr>
				<td class="text-center" colspan="5">Don't have any Item!</td>
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
		