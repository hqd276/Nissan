<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/gallery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/ekko-lightbox/ekko-lightbox.css">

<style type="text/css">
    .ekko-lightbox .modal-dialog {
    	width: 70% !important;
    }
</style>

<div class=" bg-white">
	<h2 class="text-uppercase">Gallery</h2>
	<hr>
	<a href="<?php echo base_url()?>" class="">Home</a> / <a href="<?php echo base_url().'gallery'?>">Gallery</a>
	<hr>

	<div class="row col-md-12">
		<?php foreach ($list_items as $key => $value) {?>
			<div class="col-xs-6 col-md-3">
			    <div class="thumbnail">
			    	<a href="<?php echo base_url("uploads/gallery/".$value['image']); ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $value['title'] ?>">
                        <img src="<?php echo base_url("uploads/gallery/".$value['image']); ?>" class="img-responsive">
                    </a>
			      	<!-- <div class="caption text-center">
				        <h4><?php echo $value['title'] ?></h4>
			      	</div> -->
			    </div>
		  </div>
		<?php }
		?>
	</div>
	<div class="clearfix"></div>
</div>

<script src="<?php echo base_url();?>assets/css/ekko-lightbox/ekko-lightbox.js"></script>

<script type="text/javascript">
    $(document).ready(function ($) {
        // delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    if (window.console) {
                        return console.log('Checking our the events huh?');
                    }
                },
				onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
				}
            });
        });

        //Programatically call
        $('#open-image').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

    });
</script>