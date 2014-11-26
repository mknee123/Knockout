<?php
session_start();
//the id of which product to show starts off as a default:
$chosen_id = 1;
//before it runs the query, replace that id # with the one the user chose, if user clicked on of the footbag products pg
if (isset($_POST['detail_id'])){
	$chosen_id=$_POST['detail_id'];
}
//bring in the function code from an external document:
include('includes/function-lib.php');
//run a query using on of the function from the include
$results = run_my_query('SELECT*FROM product_table WHERE id='.$chosen_id);
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

<title>Knockout Footbags - Product Details</title>
</head> 
<body>
<div class="bs-example"><!--Opening of Bs-example div tag-->
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"><!--Opening of Navbar header -->
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="login.php" class="navbar-brand" id="red"><img id="logo" src="img/logo_new_sm.png" /></a>     
        </div><!--closing of Navbar header -->
        <!-- Collection of nav links and other content for toggling -->
       <div id="navbarCollapse" class="collapse navbar-collapse"> <!--Opening of NabarCollapse-->
            <ul class="nav navbar-nav">
                <li><a href="index.php">home</a></li>
                <li><a href="products.php">footbags</a></li> 
                <li><a href="contact.php">contact</a></li>
				<?php
			if(isset($_SESSION['logged_in'])){
			//if user is logged in allow them access to the following pages
			echo "<li><a href=\"add-product.php\">add footbag</a></li>
            <li><a href=\"products.php\">delete footbag</a></li>
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
        </div><!--Closing of NabarCollapse-->
    </nav>
</div><!--closing of Bs-example div tag-->
<main>

<?php
//pull info from $results to display a little about each product/footbag:
//set our search to the first row in $results
$results->data_seek(0);
//this loops does what's in {} to each row retrieved by the mysql query above, stopping when it runs out of rows:
while($row = $results->fetch_assoc()){
	//pick each value out of the $row and store each in a var
	//store id of footbage
	$p_id = $row['id'];
	//store name of footbage
	$p_name = $row['name'];
	//store price of footbage
	$p_price = $row['price'];
	//store fill of footbage
	$p_fill = $row['fill'];
	//store description of footbag
	$p_desc = $row['description'];
	//store thumbnail size image
	$p_thumb = $row['thumb'];
	//store full image size
	$p_full = $row['imgFull']
	//display those variable amid some HTML?> 
	<div class="row"><!--Opening Wrapper tag -->
    	<div class="col-lg-2"></div>
    	<div class="col-lg-10">
         <div id="lg_ptitle"><!--Opening of ptitle div tag-->
            <h1>Details for..."<?php /* display the name */ echo $p_name; ?>" </h1>
         	<a href="products.php" id="viewall">View All Records</a>
         </div><!--Closing of ptitle div tag-->
         <div class="row" id="product_display"><!--opening of row tag-->
		 <div id="container2">
     	 	<div class="col-xs-12 col-lg-6"><!--  opening of col tag -->
       		 	<img  id="full_image" src="img/<?php /*dis the thumbnale image name */ echo $p_full; ?>" alt="<?php /*display the name*/ echo $p_name?>"  class="img-responsive center-block"/>
      		</div><!--Closes div tag for image-->
      		<div class="col-xs-12 col-lg-6"><!-- opening of col tag--> 
      			<div id="pHeader2"><!--Opens the product div header <?php /* display the id */ echo $p_id.'.'; ?>-->
    				<h2 id="name2"> <?php /* display the name */ echo $p_name; ?></h2>
       			</div><!--Closes the product div header--> 
      			<div id="bio"> <!--Opens div bio tag--> 
        			<h5 id="desc"><!--<strong>Bio:</strong>--><?php /* diplay the description*/ echo ' '.$p_desc; ?> </h5>
       			</div><!--Closes div bio tag-->
                <div id="pFooter2"><!--Opens div footer tag of products-->
                    <div id="fill2"><!--Opening of fill tag-->
                         <h3><strong>Fill:</strong><?php /* diplay the fill*/ echo ' '.$p_fill; ?></h3>
                    </div><!--Opening of fill tag-->
                    <div id="price2"><!--Opening of price tag-->
                        <h3> <strong>$<?php /* diplay the price*/ echo $p_price; ?></strong></h3>
                    </div><!--Opening of price tag-->
                 </div> <!--Opens div footer tag of products-->
				 </div><!--close of container2_display-->
      		</div> <!--closing of col tag-->
           </div><!--closing of row tag -->  
<?php	
}//close WHILE loop through $results
?>
</div><!--closing of col tag -->
</div><!--closing of row tag -->
</main>
</body>
</html> 