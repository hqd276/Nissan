<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact.css">

<<<<<<< HEAD
<div class="contact-form col-sm-12 bg-white">
	<div class="col-sm-4">
=======
<div class="contact-form col-xs-12 bg-white">
	<div class="col-xs-4">
>>>>>>> origin/master
		<h2 class="text-uppercase"><?php echo $setting['contact']['data']->name;?></h2>
		<p>
			<?php echo $setting['contact']['data']->detail;?>
		</p>
	</div>
	<form class="form-horizontal  col-xs-8" role="form" method="post" action="<?php echo base_url();?>contact">
		<div class="form-group">
			<div>
				<span class="success">
					<?php 
					if(isset($b_Check))
						if ($b_Check){
							echo "Send Success!";
						}else{
							echo "Send Fail";
						}
					?>
				</span>
				<label class="control-label" for="inputError1"><?php echo form_error('email'); ?></label><br>
				<label class="control-label" for="inputError1"><?php echo form_error('content'); ?></label>
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Email</label>
			<div class="col-xs-10">
			  	<input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Số điện thoại</label>
			<div class="col-xs-10">
			  	<input type="" class="form-control" id="inputEmail3" name="phone" placeholder="Số điện thoại" value="<?php echo set_value('phone'); ?>">
			</div>
		</div>
		<div class="form-group col-xs-12">
			<label for="inputEmail3" class="col-xs-2 control-label">Nội dung</label>
			<div class="col-xs-10">
				<textarea class="form-control" name="content" placeholder="Nội dung"><?php echo set_value('content'); ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
			  <button type="submit" class="btn btn-default">Send</button>
			</div>
		</div>
	</form>

</div>
<div class="clearfix"></div>