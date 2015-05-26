<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">List Image</h2>
	<a href="<?php echo base_url('/admin/banner/add')?>" class="btn btn-default pull-right"> Add new Image </a>
	
	<table class="table table-bordered table-hover">
		<thead>
			<th>Id</th>
			<th>Title</th>
			<th>Image</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php if(count($list)>0){ ?>
			<?php foreach($list as $item) {?>
			<tr>
				<td><?php echo $item["id"]?></td>
				<td><?php echo $item["title"]?></td>
				<td><?php 
				if ($item['image']!='') {
					echo "<img class='img_item' style='height:150px;' src='".base_url("uploads/banner/".$item['image'])."'/>";
				}
				?></td>
				<td><?php echo ($item["status"])?"Hiển thị":"Không hiển thị"?></td>
				<td>
					<a href="<?php echo base_url("/admin/banner/edit/".$item["id"]);?>"  class="btn btn-default">Edit</a>
					<a href="#" onclick="confirmClick('<?php echo base_url('/admin/banner/delete/'.$item["id"])?>')" class="btn btn-default"> Delete </a>
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
		    <li class="previous <?php if ($prev <1) echo 'disabled';?>"><a href="<?php if ($prev >=1) echo  base_url().'admin/banner/'. $prev ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
		    <li class="next <?php if ($next == 0) echo 'disabled';?>"><a href="<?php if ($next <> 0) echo base_url().'admin/banner/'. $next ?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
	  	</ul>
	</nav>
</div>
		