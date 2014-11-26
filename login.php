<?php
session_start();
?><!DOCTYPE html>
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

<title>Login: Knockout</title>
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
            	<li><a href="logout.php">LogOut</a></li>
            	<?php } ?>
                <li><a href="#">Cart</a></li>    
            </ul>
        </div>
    </nav>   
</div>
<main>
	<div class="row"><!--opening of row tag-->
        <div class="col-lg-2" id="cart_coming_soon"><!--opening of cart tag-->
        </div><!--closing of cart tag-->
        <div class="col-lg-10" id="product_display"><!--Opening Wrapper tag -->
             <div id="ptitle"><!--Opening of ptitle div tag-->
                <h1>Login</h1>
                <p id="solgan">-An online store to provide you with quality footbags</p><meta name="description" content="This is an online retailer that specializes in the sales of Footbags or Hackysacks. Footbags for all ages and for all around the world. Footbags filled with Sand, beads and plastic."> 
             </div><!--Closing of ptitle div tag-->   
             <div id="container"><!--Opening of php and form tag -->
                <?php
                //if they're being sent back to this page from process-login:
                if(isset($_GET['error'])){
                    if($_GET['error']=='invalid'){
                    echo 'No such user.  Please try again';	
                    }
                }
                ?>
                <form action="process-login.php" method="post" id="loginForm" >
                <p>Please enter user name and password for administrator privileges to add or remove footbags.  Thanks! </p>                     
                        <label>Username:</label>
                        <input type="text" name="uusername" />                      
                       <label>Password:</label>
                       <input type="password" name="upass" />                       
                        
                        <input type="submit" value="Log in" id="logIn" />
                        
                </form>
              </div><!--Close of Container tag -->
        </div><!--Closing of product_display tag -->
	</div><!--Closing of row tag-->
</main>
</body>
</html>                                		