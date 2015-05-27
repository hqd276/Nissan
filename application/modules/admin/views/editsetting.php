<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#detail",
    height:"300",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   toolbar: "insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
});
</script>

<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase"><?php echo $title?></h2>
	<a href="/admin/setting" class="btn btn-default pull-right"> List Setting </a>

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
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Setting</label>
			<label for="inputEmail3" class="col-sm-10 control-label text-left"><?php echo $item['key']; ?></label>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="name" placeholder="Name" value="<?php echo $item['name']; ?>">
			</div>
		</div>
		<!-- <div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
			<div class="col-sm-10">
				<?php 
				if ($item['image']!='') {
					echo "<img class='img_item' style='height:150px;' src='".base_url("uploads/settings/".$item['image'])."'/>";
				}
				?>
			  	<input type="file" class="form-control" id="inputEmail3" name="image" placeholder="Image">
			</div>
		</div> -->
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="description" placeholder="Description" style="height:150px;"><?php echo $item['description']; ?></textarea>
			</div>
		</div>
		<?php if  (($item['key'] == 'about')||($item['key'] == 'contact')) {?>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Detail</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="detail" name="detail" placeholder="Detail"><?php echo $item['detail']; ?></textarea>
			</div>
		</div>
		<?php }?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default" value="ok" name="submit">Send</button>
			</div>
		</div>
	</form>
</div>
		