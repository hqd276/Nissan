<div class="estimates-form col-sm-12">
	<h2 class="text-uppercase">Đăng kí lái thử</h2>
	<hr>
	<a href="<?php echo base_url()?>" class="">Home</a> / <a href="<?php echo base_url('du-toan-chi-phi')?>">Dự toán chi phí</a>
	<hr>
	<form method="get" action="">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Chọn xe</label>
					<select class="form-control" name="p">
						<option value="-1">Chọn</option>
						<?php foreach ($list_product as $key => $value) {?>
							<option value="<?php echo $value['id']?>" <?php if ($value['id']==$p) echo 'selected'?>><?php echo $value['title']?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<hr>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Họ tên</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label>Giới tính</label>
					<select class="form-control" name="gender">
						<option value="1">Nam</option>
						<option value="0">Nữ</option>
					</select>
				</div>
				<div class="form-group">
					<label>Năm sinh</label>
					<input type="text" class="form-control" name="birth">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Địa chỉ</label>
					<input type="text" class="form-control" name="address">
				</div>
				<div class="form-group">
					<label>Thành phố</label>
					<input type="text" class="form-control" name="city">
				</div>
				<div class="form-group">
					<label>Điện thoại</label>
					<input type="text" class="form-control" name="phone">
				</div>
				<div class="form-group">
					<label>Ngành nghề</label>
					<input type="text" class="form-control" name="job">
				</div>
			</div>
			<div class="col-sm-12 text-center">
				<div class="form-group">
					<button type="submit" class="btn btn-default text-uppercase">Gửi</button>
				</div>
			</div>
		</div>
	</form>
	
</div>