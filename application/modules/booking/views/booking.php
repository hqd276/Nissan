<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$(function () {
		$('#to').datetimepicker({
			pickTime: false,
		});
		$('#from').datetimepicker({
			pickTime: false,
		});

		$("#adult").keydown(function (e) {
	        checkInput(e);
    	});
    	$("#children").keydown(function (e) {
	        checkInput(e);
    	});
    	$("#phone").keydown(function (e) {
	        checkInput(e);
    	});
    	function checkInput(e){
			// Allow: backspace, delete, tab, escape, enter and .
	        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	             // Allow: Ctrl+A
	            (e.keyCode == 65 && e.ctrlKey === true) || 
	             // Allow: home, end, left, right
	            (e.keyCode >= 35 && e.keyCode <= 39)) {
	                // alert("Input Number Only!");
	                return;
	        }
	        // Ensure that it is a number and stop the keypress
	        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	            e.preventDefault();
	        }
    	}
	});
</script>

<div class="booking-form col-sm-12 bg-white">
	<form class="form-horizontal col-sm-12" role="form" method="post" action="">
		<!-- <h2 class="text-uppercase">Booking form</h2> -->
		<img class="col-sm-12" src="<?php echo base_url();?>images/booking.jpg">
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
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">From</label>
			<div class="col-sm-4">
				<div class='input-group date' id='from'>
				  	<input type="text" class="form-control" id="" name="from" placeholder="From" data-date-format="DD/MM/YYYY" value="<?php echo set_value('from'); ?>">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">To</label>
			<div class="col-sm-4">
				<div class='input-group date' id='to'>
				  	<input type="text" class="form-control" id="" name="to" placeholder="To" data-date-format="DD/MM/YYYY" value="<?php echo set_value('to'); ?>">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Departure</label>
			<div class="col-sm-4">
			  	<input type="text" class="form-control" id="" name="departure" placeholder="Departure" value="<?php echo set_value('departure'); ?>">
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label">Destination</label>
			<div class="col-sm-4">
			  	<input type="text" class="form-control" id="" name="destination" placeholder="Destination" value="<?php echo set_value('destination'); ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Guests</label>
			<div class="col-sm-2">
			  	<input type="text" class="form-control" id="adult" name="adult" placeholder="Adult" value="<?php echo set_value('adult'); ?>">
			</div>
			<div class="col-sm-2">
			  	<input type="text" class="form-control" id="children" name="children" placeholder="Children" value="<?php echo set_value('children'); ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
			  	<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
			<div class="col-sm-10">
			  	<input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo set_value('phone'); ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Content</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="content" placeholder="Content"><?php echo set_value('content'); ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">Send</button>
			</div>
		</div>
	</form>
</div>
