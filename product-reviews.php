<?php
session_start();
//bring in the function code from an external document:
include('includes/function-lib.php');
//creating a var to store with xml file data is located
$file = 'data/reviews.xml';
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
<title>Knockout Footbags - Customer Reviews</title>

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
            	<li><a href="logout.php">log out</a></li>
            	<?php } ?>
                <li><a href="#">Cart</a></li>    
            </ul>
        </div>
    </nav>
</div>
<main>
<div id="row"><!--opening of row tag -->
	<div id="col-lg-2"></div>
	<div id="product_display" class="col-lg-10"><!--Opening Wrapper2 tag -->
         <div id="ptitle"><!--Opening of ptitle div tag-->
            <h1>Footbag Reviews</h1>
            <a href="products.php" id="backtobags">Back to Footbags</a>
            <h3>See what are customers are saying.</h3>
         </div><!--Closing of ptitle div tag-->
    

     <div id="container3">  
	<?php
//load the xml data into var $reviews, which will be an Object
$reviews = simplexml_load_file($file) or die('Error:simplexml_load_file failed');
//loop through the child elements of our XML <reviews> root element, doing what's in {} to each <customer>. 
//We'll refer to the chunk of data in each <customer> element as '$e_data' -> is the... 
//... object operator. => is the double arrow operator for accessing array values
foreach($reviews->children() as $customer => $e_data){
	//store into var each bit of data that i want from the reviews
	$e_uname = $e_data->username;
	$e_id = $e_data['id'];
	$e_ucountry = $e_data->country;
	$e_udate = $e_data->todaysdate;
	$e_ubag = $e_data->footbag;
	$e_urating = $e_data->rating;
	$e_ureview = $e_data->review;
	//displaying an attractive HTML content structure and finding stragetic places to place vars
	?>
 <div id="wrapper5"><!--Opening Wrapper tag -->
        <p id="username"><?php echo $e_id.'. '.$e_uname; ?></p>
        <p id="location">country: <?php echo $e_ucountry; ?></p>
        <p id="udate"><?php echo $e_udate; ?></p>
        <p id="ubag">footbag: <?php echo $e_ubag; ?></p>
        <p id="urating">Rating:<?php echo $e_urating; ?></p>
        <p id="ureview"><strong>Review:</strong><?php echo $e_ureview; ?></p>
  </div>       
<?php    
}
?> 
	</div><!--Closing of Container tag -->   
    </div><!--closing of Wrapper2 tag-->
   
  </div> <!--close of row tag-->
</main>
</body>
</html> 