<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">List page</h2>
	
	<table class="table table-bordered table-hover">
		<thead>
			<th>Id</th>
			<th>Key</th>
			<th>Name</th>
			<!-- <th>Group Name</th> -->
			<th>Action</th>
		</thead>
		<tbody>
		<?php if(count($list)>0){ ?>
			<?php foreach($list as $item) {?>
			<tr>
				<td><?php echo $item["id"]?></td>
				<td><?php echo $item["key"]?></td>
				<td><?php echo $item["name"]?></td>
				<!-- <td><?php echo $item["groupname"]?></td> -->
				<td>
					<a href="<?php echo base_url("admin/page/edit/".$item["id"]);?>" class="btn btn-default"> Edit </a>
				</td>
			</tr>
			<?php }?>
		<?php }else{?>
			<tr>
				<td class="text-center" colspan="3">Don't have any Item!</td>
			</tr>
		<?php }?>
		</tbody>
	</table>
</div>
		