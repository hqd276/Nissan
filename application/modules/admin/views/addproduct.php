<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
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

<div class="contact-form col-xs-12 bg-white">
	<h2 class="text-uppercase"><?php echo $page_title?></h2>
	<a href="<?php echo base_url('/admin/product/index/'.$type)?>" class="btn btn-default pull-right"> List <?php echo $title?> </a>
	<a href="<?php echo base_url('/admin/product/add/'.$type)?>" class="btn btn-default pull-right"> Add new <?php echo $title?> </a>
	<form class="form-horizontal col-md-12" role="form" method="post" enctype="multipart/form-data" action="">
		<div class="form-group">
			<div>
				<span class="success">
					<?php 
					if(isset($b_Check))
						if ($b_Check){
							echo "<div class='alert alert-success' role='alert'>Add Success</div>";
						}else{
							echo "<div class='alert alert-danger' role='alert'>".validation_errors()."</div>";
						}
					?>
				</span>
				<?php if(form_error('name')!='') echo '<label class="control-label alert alert-warning" for="inputError1">'.form_error('name').'</label>'; ?>
				<?php if(isset($upload_mess)) echo '<label class="control-label alert alert-warning" for="inputError1">'.$upload_mess.'</label>'; ?>
			</div>
		</div>
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active"><a href="#detail" aria-controls="home" role="tab" data-toggle="tab">Chi tiết</a></li>
		  <li role="presentation"><a href="#version" aria-controls="home" role="tab" data-toggle="tab">Phiên bản</a></li>
		  <li role="presentation"><a href="#furniture" aria-controls="home" role="tab" data-toggle="tab">Nội thất</a></li>
		  <li role="presentation"><a href="#exterior" aria-controls="home" role="tab" data-toggle="tab">Ngoại thất</a></li>
		  <li role="presentation"><a href="#meta" aria-controls="home" role="tab" data-toggle="tab">Quản lý SEO</a></li>
		</ul>
		<div class="tab-content">
			<div id="detail"  class="tab-pane active" >
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Title</label>
					<div class="col-xs-10">
					  	<input type="" class="form-control" id="inputEmail3" name="title" placeholder="Title" value="<?php echo $item['title']; ?>">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Url</label>
					<div class="col-xs-10">
					  	<?php echo $item['slug']; ?>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Image</label>
					<div class="col-xs-10">
						<?php 
						if ($item['image']!='') {
							echo "<img class='img_item' style='height:150px;' src='".base_url("uploads/product/".$item['image'])."'/>";
						}
						?>
					  	<input type="file" class="form-control" id="inputEmail3" name="image" placeholder="Image">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Price</label>
					<div class="col-xs-10">
					  	<input type="" class="form-control" id="inputEmail3" name="price" placeholder="Price" value="<?php echo $item['price']; ?>">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Description</label>
					<div class="col-xs-10">
						<textarea class="form-control" name="description" placeholder="Description"><?php echo $item['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Detail</label>
					<div class="col-xs-10">
						<textarea class="form-control" id="detail" name="detail" placeholder="Detail"><?php echo $item['detail']; ?></textarea>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Video</label>
					<div class="col-xs-10">
					  	<input type="" class="form-control" id="inputEmail3" name="video" placeholder="Video" value="<?php echo $item['video']; ?>">
					  	Chỉ điền phần in đậm: https://www.youtube.com/watch?v=<strong>vsknwG6Q7VY</strong>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Tag</label>
					<div class="col-xs-10">
					  	<input type="" class="form-control" id="inputEmail3" name="tag" placeholder="Tag" value="<?php echo $item['tag']; ?>">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Order</label>
					<div class="col-xs-10">
					  	<input type="" class="form-control" id="inputEmail3" name="order" placeholder="Order" value="<?php echo $item['order']; ?>">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Hot product</label>
					<div class="col-xs-10">
						<input type ="checkbox" name="hot_product" value="1" <?php echo ($item['hot_product'] == 1)?"checked":""; ?>>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Home product</label>
					<div class="col-xs-10">
						<input type ="checkbox" name="home_product" value="1" <?php echo ($item['home_product'] == 1)?"checked":""; ?>>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="inputEmail3" class="col-xs-2 control-label">Publish</label>
					<div class="col-xs-10">
						<input type ="checkbox" name="status" value="1" <?php echo ($item['status'] == 1)?"checked":""; ?>>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
					  <button type="submit" class="btn btn-default" value="ok" name="submit">Send</button>
					</div>
				</div>
			</div>
			<div id="version" class="tab-pane" >
				<?php if($item['versions']){
					foreach ($item['versions'] as $k => $v) { ?>
					<div class="version">
						<div class="form-group col-xs-12">
							<label class="col-xs-2 control-label">Title</label>
							<div class="col-xs-10">
							  	<input type="" class="form-control" id="inputEmail3" name="titles[]" placeholder="Title" value="<?php echo $v['title']?>">
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="col-xs-2 control-label">Price</label>
							<div class="col-xs-10">
							  	<input type="" class="form-control" id="inputEmail3" name="prices[]" placeholder="Price" value="<?php echo $v['price']?>">
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="col-xs-2 control-label">Detail</label>
							<div class="col-xs-10">
								<textarea class="form-control" id="detail" name="details[]" placeholder="Detail"><?php echo $v['detail']?></textarea>
							</div>
						</div>
					</div>
				<?php }
				}?>
				<div class="version core hidden">
					<div class="form-group col-xs-12">
						<label class="col-xs-2 control-label">Title</label>
						<div class="col-xs-10">
						  	<input type="" class="form-control" id="inputEmail3" name="titles[]" placeholder="Title" value="">
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="col-xs-2 control-label">Price</label>
						<div class="col-xs-10">
						  	<input type="" class="form-control" id="inputEmail3" name="prices[]" placeholder="Price" value="">
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="col-xs-2 control-label">Detail</label>
						<div class="col-xs-10">
							<textarea class="form-control detail-v" id="detail" name="details[]" placeholder="Detail"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<div class="col-xs-10">
						<span class="btn btn-default add-more-version">Add more Version</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
					  <button type="submit" class="btn btn-default" value="ok_version" name="submit">Send</button>
					</div>
				</div>
			</div>
			<div id="furniture" class="tab-pane" >
				<?php if($item['furnitures']){
					foreach ($item['furnitures'] as $k => $v) { ?>
					<div class="col-xs-3"> 
						<img style="width:100%" src="<?php echo base_url("uploads/product-furniture/".$v); ?>">
					</div>
				<?php }
				}?>
				<div class="form-group col-xs-12 furniture core hidden">
					<label for="inputEmail3" class="col-xs-2 control-label">Image</label>
					<div class="col-xs-10">
					  	<input type="file" class="form-control" id="inputEmail3" name="furniture[]" placeholder="Image">
					</div>
				</div>

				<div class="form-group col-xs-12">
					<div class="col-xs-10">
						<span class="btn btn-default add-more-furniture">Add more furniture</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
					  <button type="submit" class="btn btn-default" value="ok_furniture" name="submit">Send</button>
					</div>
				</div>
			</div>
			<div id="exterior" class="tab-pane" >
				<?php if($item['exteriors']){
					foreach ($item['exteriors'] as $k => $v) { ?>
					<div class="col-xs-3"> 
						<img style="width:100%" src="<?php echo base_url("uploads/product-exterior/".$v); ?>">
					</div>
				<?php }
				}?>
				<div class="form-group col-xs-12 exterior core hidden">
					<label for="inputEmail3" class="col-xs-2 control-label">Image</label>
					<div class="col-xs-10">
					  	<input type="file" class="form-control" id="inputEmail3" name="exterior[]" placeholder="Image">
					</div>
				</div>

				<div class="form-group col-xs-12">
					<div class="col-xs-10">
						<span class="btn btn-default add-more-exterior">Add more exterior</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
					  <button type="submit" class="btn btn-default" value="ok_exterior" name="submit">Send</button>
					</div>
				</div>
			</div>
			<div id="meta" class="tab-pane" >
				<div class="form-group col-xs-12">
					<label class="col-xs-3 control-label">Tiêu đề</label>
					<div class="col-xs-9">
						<input class="form-control" name="meta_title" value="<?php echo $item['meta_title']; ?>">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label class="col-xs-3 control-label">Từ khóa</label>
					<div class="col-xs-9">
						<input class="form-control" name="meta_keyword" value="<?php echo $item['meta_keyword']; ?>">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label class="col-xs-3 control-label">Giới thiệu</label>
					<div class="col-xs-9">
						<input class="form-control" name="meta_description" value="<?php echo $item['meta_description']; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-10">
					  <button type="submit" class="btn btn-default" value="ok_meta" name="submit">Send</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<style type="text/css">
	.tab-content {
		padding-top: 30px;
		border: 1px solid #ddd;
		border-top:none;
	}
	.tab-content .version{
		padding: 10px;
		border-radius: 4px;
		background-color: #ededed;
		border: 1px solid #ddd;
		overflow: hidden;
		margin: 0 30px 30px;
	}
</style>
<script type="text/javascript">
	$('.add-more-version').click(function(){
		if($('.version').length>3) {
			$(this).hide();
		}else{
			$('.version.core').clone().removeClass('core').removeClass('hidden').insertAfter('.version:last');
		}
	});
	$('.add-more-furniture').click(function(){
		$('.furniture.core').clone().removeClass('core').removeClass('hidden').insertAfter('.furniture:last');
	});
	$('.add-more-exterior').click(function(){
		$('.exterior.core').clone().removeClass('core').removeClass('hidden').insertAfter('.exterior:last');
	});
</script>
		