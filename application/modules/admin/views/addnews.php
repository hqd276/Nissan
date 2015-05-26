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
   file_browser_callback: function(field_name, url, type, win) {
        if(type=='image') $('#my_form input').click();
    },
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
<iframe id="form_target" name="form_target" style="display:none"></iframe>

<form id="my_form" action="/upload/" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
	<input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
</form>

<div class="contact-form col-sm-12 bg-white">
	<h2 class="text-uppercase">Add new <?php echo $title?></h2>
	<a href="<?php echo base_url('/admin/news/index/'.$type)?>" class="btn btn-default pull-right"> List <?php echo $title?> </a>

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
			<label for="inputEmail3" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="title" placeholder="Title" value="<?php echo $item['title']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Url</label>
			<div class="col-sm-10">
			  	<?php echo $item['slug']; ?>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
			<div class="col-sm-10">
				<?php 
				if ($item['image']!='') {
					echo "<img class='img_item' style='height:150px;' src='".base_url("uploads/news/".$item['image'])."'/>";
				}
				?>
			  	<input type="file" class="form-control" id="inputEmail3" name="image" placeholder="Image">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
			<div class="col-sm-10">
				<select class='form-control' name='category_id'>
					<option value='-1' <?php echo ($item['category_id'] == -1)?'selected':''?> >- Root -</option>
					<?php echo $category_box;?>
				</select>
			</div>
		</div>
		<!-- <div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Price</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="price" placeholder="Price" value="<?php echo $item['price']; ?>">
			</div>
		</div> -->
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="description" placeholder="Description"><?php echo $item['description']; ?></textarea>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Detail</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="detail" name="detail" placeholder="Detail"><?php echo $item['detail']; ?></textarea>
			</div>
		</div>
		<?php if(in_array($type, array(1,2))) {?>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Information</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="info" name="info" placeholder="Information"><?php echo $item['info']; ?></textarea>
			</div>
		</div>
		<?php }?>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Tag</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="tag" placeholder="Tag" value="<?php echo $item['tag']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Order</label>
			<div class="col-sm-10">
			  	<input type="" class="form-control" id="inputEmail3" name="order" placeholder="Order" value="<?php echo $item['order']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Hot News</label>
			<div class="col-sm-10">
				<input type ="checkbox" name="hot_news" value="1" <?php echo ($item['hot_news'] == 1)?"checked":""; ?>>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Home News</label>
			<div class="col-sm-10">
				<input type ="checkbox" name="home_news" value="1" <?php echo ($item['home_news'] == 1)?"checked":""; ?>>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="inputEmail3" class="col-sm-2 control-label">Video News</label>
			<div class="col-sm-10">
				<input type ="checkbox" name="is_video" value="1" <?php echo ($item['is_video'] == 1)?"checked":""; ?>>
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
		