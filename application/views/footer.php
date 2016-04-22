<div class="container">
  <div class="footer">
    <ul class="nav nav-footer text-uppercase hidden-xs">
      <li><a href="<?php echo base_url().'tra-gop'?>">Tín dụng mua xe</a></li>
      <li><a href="<?php echo base_url().'danh-muc/khuyen-mai'?>">Sản phẩm khuyến mãi</a></li>
      <!-- <li><a href="<?php echo base_url().'dang-ky-lai-thu'?>">Đăng ký lái thử</a></li> -->
      <li><a href="<?php echo base_url().'danh-muc/tin-tuc'?>">Tin tức sự kiện</a></li>
      <li><a href="<?php echo base_url().'ban-do-showroom'?>">Bản đồ Showroom</a></li>
    </ul>
    <div class=" hidden-xs">
      <div class="col-sm-4">
        <h5 class="text-uppercase">Sản phẩm</h5>
        <ul class="list-unstyled row">
          <?php foreach ($products as $key => $value) {?>
            <li class="col-sm-6">
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
        <h5 class="text-uppercase">Nissan Hà Nội</h5>
        <ul class="list-unstyled">
          <?php foreach ($abouts as $key => $value) {?>
            <li><a href="<?php echo base_url().'chi-tiet/'.$value['slug']?>"><?php echo $value['title']?></a></li>
          <?php }?>
        </ul>
      </div>
      <div class="col-sm-4 contact">
        <span>NISSAN HÀ NỘI</span><br>
        Add: 48 Láng Hạ, Quận Đống Đa, TP. Hà Nội, Việt Nam<br>
        Tel : (84 4)3766 7777 * Fax (84 4)3248 4515<br>
        website : www.nissan.hanoi.vn
      </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <span class="pull-right copyright">&copy; 2015 Nissan Vietnam Co., Ltd | Site by HD </span>
  </div>
</div>

<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=e80635808b46d828312d1feb96974f45&data=eyJzc29faWQiOjk2NzU0MywiaGFzaCI6IjE4NTU4M2VhM2JlNWQ2YjgwMGI0MzA1MTY0OGQyMThiIn0-&pname='+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script> 