<div class="login-form bg-white col-md-6 col-md-offset-3">
	<h2 class="">Login form</h2>
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>login">
		<div class="form-group">
			<div>
				<span class="success">
					<?php if(isset($b_Check) && $b_Check == false){
						echo "Login Fail!";
					}?>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
			  	<input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
				<label class="control-label" for="inputError1"><?php echo form_error('email'); ?></label>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			  	<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
			  	<label class="control-label" for="inputError1"><?php echo form_error('password'); ?></label>
			</div>
		</div>
		<!-- <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <div class="checkbox">
			    <label>
			      <input type="checkbox"> Remember me
			    </label>
			  </div>
			</div>
		</div> -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">Sign in</button>
			</div>
		</div>
	</form>

</div>

<div class="clearfix"></div>