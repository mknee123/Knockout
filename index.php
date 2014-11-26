<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--style sheets-->
<link href="css/responsive-slider.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="js/responsive-slider.js"></script>
<script src="js/responsive-slider.min.js"></script>
<title>Knockout Footbags - Online Footbag Retailer - Footbags for all levels of players</title>


<script>
$( document ).ready( function() {
  $('.responsive-slider').responsiveSlider({
    autoplay: true,
    interval: 5000,
    transitionTime: 300
  });
});
</script>

</head> 
<body>
<div class="bs-example">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a href="login.php" class="navbar-brand" id="red"><img id="logo" src="img/logo_new_sm.png" /></a>      
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">home</a></li>
                <li><a href="products.php">footbags</a></li> 
                <li><a href="contact.php">contact</a></li>
				<?php
			if(isset($_SESSION['logged_in'])){
			//if user is logged in allow them access to the following pages
			echo "<li><a href=\"add-product.php\">add footbag</a></li>
           
			<li><a href=\"product-reviews.php\">reviews</a></li>";
			}
			?> 
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	
            	<?php if(!isset($_SESSION['logged_in'])){?>
                <li><a href="login.php">Login</a></li>
                <?php }else {?>
            	<li><a href="logout.php">Log Out</a></li>
            	<?php } ?>
                <li><a href="#">Cart</a></li>    
            </ul>
        </div>
    </nav>
</div>
<main>
  <div class="row"><!--open a row -->
        <div class="col-lg-2" id="cart_coming_soon"><!--opening of cart tag-->
        </div><!--closing of cart div-->
        <div id="product_display" class="col-lg-10">
           
          <!-- Responsive slider - START -->
<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
  <div class="slides" data-group="slides">
    <ul>
      <li>
        <div class="slide-body" data-group="slide">
          <img src="img/bg_slide_1.png">
          <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
            <!--<h2>We always provide...</h2>
            <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">With one to one swipe movement!</div>-->
          </div>
          <div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
            <img src="img/text_slide_1.png">
          </div>
          <div class="caption img-css3" data-animate="slideAppearRightToLeft">
            <img src="img/person_slide_1.png">
          </div>
        </div>
      </li>
      <li>
        <div class="slide-body" data-group="slide">
          <img src="img/bg_slide_2.png">
          <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
           <!-- <h2>Socialize</h2>
            <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">Compatible!</div>-->
          </div>
         <div class="caption img-bootstrap" data-animate="slideAppearDownToUp" data-delay="200">
            <img src="img/person_slide_2.png">
          </div>
          <div class="caption img-twitter" data-animate="slideAppearUpToDown">
            <img src="img/text_slide_2.png">
          </div>
        </div>
      </li>
      <li>
        <div class="slide-body" data-group="slide">
          <img src="img/bg_slide_3.png">
          <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
            <!--<h2>Custom animations</h2>
           <div class="caption img-twitter" data-animate="slideAppearUpToDown">
            <img src="img/text_slide_2.png">
          </div>-->
          </div>
          <div class="caption img-jquery" data-animate="slideAppearDownToUp" data-delay="200">
            <img src="img/person_slide_3.png">
          </div>
        </div>
      </li>
    </ul>
  </div>
  <a class="slider-control left" href="#" data-jump="prev"><</a>
  <a class="slider-control right" href="#" data-jump="next">></a>
  <div class="pages">
    <a class="page" href="#" data-jump-to="1">1</a>
    <a class="page" href="#" data-jump-to="2">2</a>
    <a class="page" href="#" data-jump-to="3">3</a>
  </div>
</div>
<!-- Responsive slider - END -->   
<!-- <div id="wrapper2" class=""><!--Opening Wrapper tag -->
                 <div id="ptitle"><!--Opening of ptitle div tag-->
                    <h1>What is Knock-Out?</h1>
                    <h3>-An online store to provide you with quality footbags</h3> 
					<p> We at Knock-Out strive to provide top quality footbags to all our customers around the World.  Yes that's right, we are global.  We love providing footbags to the public because at the same time we are promoting exercise, coordination, concentration, and a challenge to our active players. Feel free to view our catalog and see for yourself what types of footbags we have to offer.</p>
					<p>Knock-Out is a fairly young company based out of the beautiful Pennsylvania.  It was created by a group of people who love the sport and wanted to share their love with others.  </p>  
					
					<p>If you have any questions please visit our contact page and send us and email.  We loved to hear from you.</p>
                </div><!--Closing of ptitle div tag--> 
                
          <!--  </div>Closing of Wrapper2 tag--> 
		</div> <!--Close of products--> 
   </div> <!--Closes the div row tag-->  
</main>
</body>
</html>