<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $template['title']; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-theme.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/admin.css">
</head>

<body>
<div class="container">
	<div class="top">
		<?php echo $template['partials']['header']; ?>
	</div>
	<div class="middle">
		<?php echo $template['body']; ?>
	</div>
</div>
<!-- <div class="clearfix"></div> -->
<div class="bottom">
	<?php echo $template['partials']['footer']; ?>
</div>

</body>

</html>