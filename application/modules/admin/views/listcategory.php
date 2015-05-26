<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">List category</h2>
	<a href="<?php echo base_url('/admin/category/add/'.$type)?>" class="btn btn-default pull-right"> Add new Category </a>
	
	<table class="table table-bordered table-hover">
		<thead>
			<th>Id</th>
			<th>Email</th>
			<th>Parent</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php if(count($list)>0){ ?>
			<?php foreach($list as $item) {?>
			<tr>
				<td><?php echo $item["id"]?></td>
				<td><?php echo $item["name"]?></td>
				<td><?php echo $item["parent"]?></td>
				<td><?php echo $item["status"]?></td>
				<td>
					<a href="#" onclick="confirmClick('<?php echo base_url('/admin/category/delete/'.$type.'/'.$item["id"])?>')"  class="btn btn-default"> Delete </a>
					<a href="<?php echo base_url("/admin/category/edit/".$type."/".$item["id"]);?>" class="btn btn-default"> Edit </a>
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
</div>
		