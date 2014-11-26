<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--style sheets-->
<link href="css/responsive-slider.css" rel="stylesheet" media="screen">


<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Knockout Footbags - Contact Us</title>
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
                <li><a href="#">contact</a></li>
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
                 <div id="ptitle"><!--Opening of ptitle div tag-->
                    <h1>Contact Us</h1>  
                 </div><!--Closing of ptitle div tag-->
			<div id="container3">
            <h3>Can't get enough? Want to know more? Fill out our form and we will get back to you, eventually. </h3> 
        	<form method="post" action="process-contact.php" id="contact">        
                <label>Name</label>
                <input name="name" placeholder="Name Here">                        
                <label>Email</label>
                <input name="email" type="email" placeholder="Email Here">                        
                <label>Message</label>
                <textarea name="message" placeholder="Type Message Here" style="height:80px;"></textarea>                        
                <input id="submit" name="submit" type="submit" value="Submit">                    
            </form> 
            </div><!--close of container tag-->
		</div> <!--Close of products--> 
        
   </div> <!--Closes the div row tag-->  
</main>
</body>
</html>