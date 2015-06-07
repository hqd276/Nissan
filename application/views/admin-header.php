<h1><a class="logo" href="<?php echo base_url('admin');?>"> Administrator</a></h1>

<nav class="navbar navbar-default " role="navigation">

	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="<?php echo base_url();?>"><span class="glyphicon glyphicon-home"></span></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav text-uppercase">
		    <li class="dropdown">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="caret"></span></a>
	          	<ul class="dropdown-menu text-capitalize" role="menu">
	          		<li><a href="<?php echo base_url('admin/category/index/0');?>">News Category Manager</a></li>
                  	<li><a href="<?php echo base_url('admin/news/index/0');?>">News Manager</a></li>
                  	<li><a href="<?php echo base_url('admin/news/add/0');?>">Add new News</a></li>
	          	</ul>
	        </li>
	        <li class="dropdown">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <span class="caret"></span></a>
	          	<ul class="dropdown-menu text-capitalize" role="menu">
                  	<li><a href="<?php echo base_url('admin/product/index/0');?>">Product Manager</a></li>
                  	<li><a href="<?php echo base_url('admin/product/add/0');?>">Add new Product</a></li>
	          	</ul>
	        </li>
	        <!-- <li>
	        	<a href="<?php echo base_url();?>admin/advert">Advertising</a>
	        </li>
	        <li>
	        	<a href="<?php echo base_url();?>admin/member">Member</a>
	        </li> -->
	        <li>
	        	<a href="<?php echo base_url();?>admin/banner">Slide Show</a>
	        </li>
	        <!-- <li class="dropdown">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gallery <span class="caret"></span></a>
	          	<ul class="dropdown-menu text-capitalize" role="menu">
	          		<li><a href="<?php echo base_url();?>admin/category/index/0">Category</a></li>
	          		<li><a href="<?php echo base_url();?>admin/gallery">Item</a></li>
	          	</ul>
          	</li> -->
	        <li class="dropdown">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">System <span class="caret"></span></a>
	          	<ul class="dropdown-menu text-capitalize" role="menu">
	          		<!-- <li><a href="<?php echo base_url();?>admin/support">Supports</a></li>
	          		<li><a href="<?php echo base_url();?>admin/booking">Booking</a></li> -->
	          		<li><a href="<?php echo base_url();?>admin/page">Pages</a></li>
	          		<li><a href="<?php echo base_url();?>admin/setting">Settings</a></li>
	          	</ul>
          	</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
		<div class="user-info text-right col-md-4">
			Hi <span><strong><?php echo $user['email'];?></strong></span>!
			<a href="<?php echo base_url();?>logout">Logout</a> 
		</div>
	</div><!-- /.container-fluid -->
</nav>