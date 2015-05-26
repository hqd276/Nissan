<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">Add new Image</h2>
	<a href="<?php echo base_url('/admin/banner')?>" class="btn btn-default pull-right"> Banner </a>

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
				<?php if(isset($upload_mess)) echo '<label class="control-label alert alert-warning" for="inputError1">'.$upload_mess.'</label>'; ?>
			</div>
		</div>
		<!-- <div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Position</label>
			<div class="col-sm-10">
				<select class='form-control' name='category_id'>
					<option value="0">Slide Home</option>
				</select>
			</div>
		</div> -->
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="title" placeholder="Title" value="<?php echo $item['title']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
			<div class="col-sm-10">
				<?php 
				if ($item['image']!='') {
					echo "<img class='img_item' style='height:150px;' src='".base_url("uploads/banner/".$item['image'])."'/>";
				}
				?>
			  	<input type="file" class="form-control" id="inputEmail3" name="image" placeholder="Image">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Order</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="order" placeholder="Order" value="<?php echo $item['order']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Publish</label>
			<div class="col-sm-10">
				<input type ="checkbox" name="status" value="1" <?php echo ($item['status'] == 1)?"checked":""; ?>>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default" value="ok" name="submit">Send</button>
			</div>
		</div>
	</form>
</div>
		