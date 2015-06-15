<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact.css">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<style>
  #map-canvas {
    height: 400px;
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
  }
</style>
<div class="contact-form col-sm-12 bg-white ">
	<div class="col-sm-4">
		<h2 class="text-uppercase"><?php echo $setting['contact']['data']->name;?></h2>
		<p>
			<?php echo $setting['contact']['data']->detail;?>
		</p>
	</div>
	<div class="col-sm-8">
		<div id="map-canvas"></div>
	</div>
</div>
<div class="clearfix"></div>

<script>
function initialize() {
  var myLatlng = new google.maps.LatLng(20.966100, 105.769847);
  var mapOptions = {
    zoom: 13,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">NISSAN HÀ ĐÔNG</h1>'+
      '<div id="bodyContent">'+
      '<p>Nguyễn xuân Kiên (Mr) <br> Phụ trách kinh doanh :<br> Mobile:    0902.902.555   or   0912.529.187<br> Email: kiennx.nissan@gmail.com<br> NISSAN HÀ ĐÔNG<br> Add: Km14+600 Quốc Lộ 6, P. Yên Nghĩa,Quận Hà Đông , TP.Hà Nội , Việt Nam<br> Tel : (84 4)3357 1208 * Fax (84 4)3357 1203<br> website : www.nissanmienbac.vn</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'NISSAN Hà Đông.'
  });
  infowindow.open(map,marker);
  // google.maps.event.addListener(marker, 'click', function() {
  //   infowindow.open(map,marker);
  // });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>