<div class="estimates-form col-sm-12">
	<h2 class="text-uppercase">Dự toán chi phí</h2>
	<hr>
	<a href="<?php echo base_url()?>" class="">Home</a> / <a href="<?php echo base_url('du-toan-chi-phi')?>">Dự toán chi phí</a>
	<hr>
	<form method="get" action="">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Chọn xe</label>
				<select class="form-control" name="p">
					<option value="-1">Chọn</option>
					<?php foreach ($list_product as $key => $value) {?>
						<option value="<?php echo $value['id']?>" <?php if ($value['id']==$p) echo 'selected'?>><?php echo $value['title']?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label>Chọn đời</label>
				<select class="form-control" name="v">
					<option value="-1">Chọn</option>
					<?php foreach ($list_version as $key => $value) {?>
						<option value="<?php echo $key?>" <?php if ($key==$v) echo 'selected'?>><?php echo $value['title']?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label>Nơi đăng ký trước bạ</label>
				<select class="form-control" name="l">
					<option value="0">Chọn</option>
					<option value="1" <?php if (1==$l) echo 'selected'?>>Hà Nội</option>
					<option value="2" <?php if (2==$l) echo 'selected'?>>Hồ Chí Minh</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default text-uppercase">Chọn</button>
			</div>
		</div>
		<div class="col-sm-6">
			
		</div>
	</form>
	
</div>