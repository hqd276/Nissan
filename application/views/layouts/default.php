<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo (isset($title))?$title:$setting['title']['data']->description?></title>
<meta name="description" content="<?php echo (isset($description))? htmlspecialchars($description):$setting['description']['data']->description?>">
<meta name="keyword" content="<?php echo (isset($keyword))? htmlspecialchars($keyword):$setting['keyword']['data']->description?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<?php if (isset($item)){?>
<meta property="og:title" content="<?php echo $item['title'] ?>"/>
<meta property="og:description" content="<?php echo htmlspecialchars($item['description']) ?>"/>
<meta property="og:url" content="<?php echo base_url().'chi-tiet/'.$item['slug']?>" />
<meta property="og:image" content="<?php echo base_url().'uploads/news/'.$item['image']?>" />
<?php }?>

<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/gif" sizes="48x48">

<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/header.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/footer.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<script src="<?php echo base_url();?>assets/js/lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lightbox.css">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700,900,300' rel='stylesheet' type='text/css'>

</head>

<body>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '380779845466004',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="row">
  <?php echo $template['partials']['header']; ?>

  <div class="middle container" >
    <?php echo $template['body']; ?>
  </div>

  <?php echo $template['partials']['footer']; ?>
</div>

<script src="<?php echo base_url();?>assets/js/scrollReveal.js"></script>
<script>

  	// window.sr = new scrollReveal();
  	$(document).ready(function() {
        //animation for tablet & laptop screen:
        var windowsize = $(window).width();
        if (windowsize > 767) {
            //if the window is greater than 767px wide then turn on scrollReveal..
            window.sr = new scrollReveal();
        }
    });		
  	//smooth scrolling
	$(function() {
        //$('a[href*=#]:not([href=#])').click(function() {
        $('.smooth-scroll').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });	
</script>
</body>

</html>