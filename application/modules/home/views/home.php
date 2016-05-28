<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/home.css">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<style>
  #map-canvas {
    height: 300px;
    margin: 20px 10px;
    /*padding: 20px;*/
    border: 1px solid #ccc;
  }
</style>
<div class="">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	  	<?php foreach ($banners as $key => $value){?>
	  	<div class="item <?php echo ($key==0)?"active":"" ?>" >
	    	<img src="<?php echo base_url("uploads/banner/".$value['image']); ?>">
	    	<div class="carousel-caption">
	        	
	      	</div>
	    </div>
	   	<?php } ?>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

	<div class="content-home  text-center">
			<div class="col-sm-3 hot-product">
				<span class="top text-uppercase"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Sản phẩm bán chạy</span>

				<div id="myCarousel" class="carousel slide vertical">
		            <!-- Carousel items -->
		            <div class="carousel-inner">
			            <?php foreach ($products as $key => $value) {?>
				            <div class="item <?php if($key==0) echo 'active'?>">
				            	<a href="<?php echo base_url('/nissan/'.$value['slug'])?>">
				            		<img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
				                    <div class="pro-title"><?php echo $value['title']?></div>
									<!-- <div class="pro-price"><?php echo $value['price']?> VND</div> -->
				            	</a>
				            	<a class="view-detail visible-xs" href="<?php echo base_url('/nissan/'.$value['slug'])?>">
									Chi tiết
								</a>
			                </div>
	            		<?php }?>
		            </div>
		            <!-- Carousel nav -->
		            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
				 	</a>
				  	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
				 	 </a>
	            </div>
	            <div class="panel">
		            <h4>ĐƯỜNG ĐẾN ĐẠI LÝ NISSAN</h4>
	        		<div id="map-canvas"></div>
        		</div>

	            <div class="panel">
            		<strong>
            		<p>HÃY LIÊN HỆ HOTLINE BÁN HÀNG</p>
            		<p style="color: red; font-size: 16px">0902.902.555</p>
            		<p>ĐỂ ĐƯỢC TƯ VẤN VÀ HỖ TRỢ CHU ĐÁO NHẤT</p>
            		</strong>
	            </div>
			</div>
			<div class="col-sm-9 new-product hidden-xs">
				<span class="top text-uppercase"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Sản phẩm mới</span>
				<ul class="list-unstyled text-center">
					<?php foreach ($products as $key => $value) {?>
            			<li class="">
							<a class="pro-img" href="<?php echo base_url('/nissan/'.$value['slug'])?>">
								<img src="<?php echo base_url('/uploads/product/thumbs/'.$value['image'])?>">
							</a>
							
							<div class="pro-title"><?php echo $value['title']?></div>
							<div class="pro-price"><?php echo number_format($value['price'])?> VND</div>
							<a class="view-detail" href="<?php echo base_url('/nissan/'.$value['slug'])?>">
								Chi tiết
							</a>
								<!-- <p class="pro-tech">
									<?php echo $value['description']?>
								</p> -->
							
						</li>
            		<?php }?>
				</ul>
			</div>
	</div>
</div>
<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 3000
	})
</script>
<script>
function initialize() {
  var myLatlng = new google.maps.LatLng(21.020246, 105.8152853);
  var mapOptions = {
    zoom: 13,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var icon = {
          url: 'http://nissanmienbac.vn/assets/images/logo.png',
          // This marker is 20 pixels wide by 32 pixels tall.
          // size: new google.maps.Size(80, 80),
          scaledSize: new google.maps.Size(30, 40), // scaled size
          // The origin for this image is 0,0.
          origin: new google.maps.Point(0,0),
          // The anchor for this image is the base of the flagpole at 0,32.
          anchor: new google.maps.Point(0, 32)
        };
  // var contentString = '<div id="content">'+
  //     '<div id="siteNotice">'+
  //     '</div>'+
  //     '<h1 id="firstHeading" class="firstHeading">NISSAN HÀ ĐÔNG</h1>'+
  //     '<div id="bodyContent">'+
  //     '<p>Nguyễn xuân Kiên (Mr) <br> Phụ trách kinh doanh :<br> Mobile:    0902.902.555   or   0912.529.187<br> Email: kiennx.nissan@gmail.com<br> NISSAN HÀ ĐÔNG<br> Add: Km14+600 Quốc Lộ 6, P. Yên Nghĩa,Quận Hà Đông , TP.Hà Nội , Việt Nam<br> Tel : (84 4)3357 1208 * Fax (84 4)3357 1203<br> website : www.nissanmienbac.vn</p>'+
  //     '</div>'+
  //     '</div>';

  // var infowindow = new google.maps.InfoWindow({
  //     content: contentString
  // });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: icon,
      title: 'NISSAN Hà Đông.'
  });
  infowindow.open(map,marker);
  // google.maps.event.addListener(marker, 'click', function() {
  //   infowindow.open(map,marker);
  // });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<div class="clearfix"></div>