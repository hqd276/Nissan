<div class="container">
  <div class="footer">
    <ul class="nav nav-footer text-uppercase hidden-xs">
      <li><a href="<?php echo base_url().'tra-gop'?>">Tín dụng mua xe</a></li>
      <li><a href="<?php echo base_url().'danh-muc/khuyen-mai'?>">Sản phẩm khuyến mãi</a></li>
      <li><a href="<?php echo base_url().'dang-ky-lai-thu'?>">Đăng ký lái thử</a></li>
      <li><a href="<?php echo base_url().'danh-muc/tin-tuc'?>">Tin tức sự kiện</a></li>
      <li><a href="<?php echo base_url().'ban-do-showroom'?>">Bản đồ Showroom</a></li>
    </ul>
    <div class=" hidden-xs">
      <div class="col-sm-2">
        <h5 class="text-uppercase">Sản phẩm</h5>
        <ul class="list-unstyled">
          <?php foreach ($products as $key => $value) {?>
            <li class="">
              <a href="">
                <div class="pro-title"><?php echo $value['title']?></div>
              </a>
            </li>
          <?php }?>
        </ul>
      </div>
      <div class="col-sm-2">
        <h5 class="text-uppercase">Tư vấn mua xe</h5>
        <ul class="list-unstyled">
          <?php foreach ($consult as $key => $value) {?>
            <li><a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>"><?php echo $value['title']?></a></li>
          <?php }?>
        </ul>
      </div>
      <div class="col-sm-2">
        <h5 class="text-uppercase">Nissan hà đông</h5>
        <ul class="list-unstyled">
          <?php foreach ($abouts as $key => $value) {?>
            <li><a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>"><?php echo $value['title']?></a></li>
          <?php }?>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <span class="pull-right copyright">&copy; - Copyright by Nissan Hà Đông - Design by HD</span>
  </div>
</div>

<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=8b6795991207eb86f9070b66eeccfc12&data=eyJzc29faWQiOjU1OTI3NCwiaGFzaCI6IjM1YTA0YmE5NjZhZWZlYTI2NzFmODMwYTJmMWY2ZWFlIn0-&pname='+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script> 