<div class="contact-form col-xs-12 bg-white">
	<h2 class="text-uppercase"><?php echo $title?></h2>
	<a href="<?php echo base_url('/admin/member/index')?>" class="btn btn-default pull-right"> List Member </a>

	<form class="form-horizontal col-md-12" role="form" method="post" enctype="multipart/form-data" action="">
		<div class="form-group">
			<div>
				<span class="success">
					<?php 
					if(isset($b_Check))
						if ($b_Check){
							echo "<div class='alert alert-success' role='alert'>Add Success</div>";
						}else{
							echo "<div class='alert alert-danger' role='alert'>Add Fail</div>";
						}
					?>
				</span>
				<?php if(form_error('name')!='') echo '<label class="control-label alert alert-warning" for="inputError1">'.form_error('name').'</label>'; ?>
				<?php if(isset($upload_mess)) echo '<label class="control-label alert alert-warning" for="inputError1">'.$upload_mess.'</label>'; ?>
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Name</label>
			<div class="col-xs-10">
			  	<input type="" class="form-control" id="inputEmail3" name="name" placeholder="Name" value="<?php echo $item['name']; ?>">
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Image</label>
			<div class="col-xs-10">
				<?php 
				if ($item['image']!='') {
					echo "<img class='img_item' style='height:150px;' src='".base_url("uploads/member/".$item['image'])."'/>";
				}
				?>
			  	<input type="file" class="form-control" id="inputEmail3" name="image" placeholder="Image">
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Description</label>
			<div class="col-xs-10">
				<textarea class="form-control" name="description" placeholder="Description"><?php echo $item['description']; ?></textarea>
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Active</label>
			<div class="col-xs-10">
				<input type ="checkbox" name="status" value="1" <?php echo ($item['status'] == 1)?"checked":""; ?>>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
			  <button type="submit" class="btn btn-default" value="ok" name="submit">Send</button>
			</div>
		</div>
	</form>
</div>
		