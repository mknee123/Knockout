<?php
session_start();
//if user has not logged in 
if(!isset($_SESSION['logged_in'])){
	//redirect user to the login page
	header('Location:login.php');
}
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
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Knockout Footbags - Add Product</title>
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
	<div class="row">
	<div class="col-lg-2"></div>
	<div id="product_display" class="col-lg-10 "><!--Opening Wrapper tag -->
         <div id="ptitle"><!--Opening of ptitle div tag-->
            <h1>Add a Footbag</h1>
            
            
           	<a href="products.php" id="awhite">View All Footbags</a>
         </div><!--Closing of ptitle div tag-->
    <!-- </div>Closing of Wrapper2 tag -->   
	<div id="container3">
    <form action="process-product.php" method="post" enctype="multipart/form-data" id="addForm">
    	<fieldset>
        	<legend>New Footbag Specs:</legend>
          <h3>Here the administrator can add to or remove from the footbag collection.</h3>
            	<div class="newfeat" id="newname" ><!--Opening of name div tag -->
            	<label for="ufootbag">* Name:</label>
                <input type="text" name="ufootbag" id="ufootbag" tabindex="1" placeholder="Name Here" /><span id="feedname"></span>
                </div><!--Close of name div tag -->
                <div class="newfeat" id="newthumb" ><!--Opening of ThumbImg tag -->
                <label for="uthumb">* Thumb Img(150X150 jpg):</label>
                 <input type="file" name="uthumb" id="uthumb" tabindex="2" placeholder="Image"  /><span id="feedthumb"></span>
                 </div><!--close of ThumbImg div tag-->
                  <div class="newfeat" id="fullimg" ><!--Opening of fullImg tag -->
                <label for="ufull">Large Img(300X300 jpg):</label>
                 <input type="file" name="ufull" id="ufull" tabindex="3" placeholder="Image"  />
                 </div><!--close of fullImg div tag-->
                 <div class="description">
                 <label for="newdescript">Bio: </label>
                 <textarea name="newdescript" id="newdescript"  tabindex="4"></textarea>
                 </div>
                <div class="newfeat" id="newfill" ><!--Opening of filling tag --> 
                <label for="fill" >Fill:</label>  
			  <select name="fill" id="ufill" tabindex="5" >
                  <option value="Sand">Sand</option>
                  <option value="Beads">Beads</option>
                  <option value="Plastic">Plastic</option>
                </select>
                </div><!--close of filling div tag-->
                <div class="newfeat" id="newprice" ><!--Opening of newprice tag --> 
                <label for="uprice">* Price: $</label>
                <input type="text" name="uprice" id="uprice" tabindex="6" placeholder="Price Here"/><span id="feedprice"></span>
                </div><!--close of newprice div tag-->           
                <input type="submit" value="Add" id="addFootbag" tabindex="7" />
                 <input type="reset" name="reset" value="Clear" id="reset1" tabindex="8" />
        </fieldset>     
    </form>
    * Required Information.
    </div><!--close wrapper-->
    </div><!--close of wrapper2 -->
    </div><!--close of row tag-->
</main>
<script src="js/form-add-footbag.js"></script>
</body>
</html>  