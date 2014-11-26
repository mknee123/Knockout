<?php
session_start();
//bring in the function code from an external document:
include('includes/function-lib.php');
//initalize which col to sort by 
$ordercol ='id';
if(isset($_GET['sortcol'])){
	$ordercol = $_GET['sortcol'];	
}
//run a query using on of the function from the include
$results = run_my_query('SELECT*FROM product_table
	ORDER BY '.$ordercol);
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
<title>Knockout Footbags - Products</title>
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
      <!--  <div class="col-lg-2" id="cart_coming_soon"> opening of cart tag--><!--</div>closing of cart div-->
        <?php
		//$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
       //fetch results set as object and output HTML
    	//while($row = $results->fetch_assoc())
		//{
        //pick each value out of the $row and store each in a var
        //store id of footbage
       // $p_id = $row['id'];
        //store name of footbage
       // $p_name = $row['name'];
        //store price of footbage
      //  $p_price = $row['price'];
        //store fill of footbage
       // $p_fill = $row['fill'];
        //store description of footbag
       // $p_desc = $row['description'];
        //store thumbnail size image
       // $p_thumb = $row['thumb'];
        //store full image size
      //  $p_full = $row['imgFull'];}
        //display those variable amid some HTML
?> 
        
        <div id="product_display" class="col-lg-9">
            <div id="wrapper2" class=""><!--Opening Wrapper tag -->
                 <div id="ptitle"><!--Opening of ptitle div tag-->
                    <h1>Footbags</h1>
                    <h3>-An online store to provide you with quality footbags</h3> 
                </div><!--Closing of ptitle div tag--> 
                <div id="sorting"><!-- opening of sorting tag-->
                    <h5>Sort by: </h5>
                      <!--  <a href="products.php?sortcol=id" id="sort"> ID</a>-->
                        <a href="products.php?sortcol=price" id="sort"> Price</a>
                        <a href="products.php?sortcol=name" id="sort"> Name</a>
                        <a href="products.php?sortcol=fill" id="sort">Fill</a>
                </div><!--closing of sorting tag -->
            </div><!--Closing of Wrapper2 tag-->    
			<div id="wrapper3"><!--Opening Wrapper3 tag -->
				<div id="container_img">
					<img id="" src="img/product_page_img_2.jpg">      
				</div>
	<?php
    //pull info from $results to display a little about each product/footbag:
    //set our search to the first row in $results
	 //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
     $results->data_seek(0);
    if ($results) {
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
        $p_full = $row['imgFull'];
        //display those variable amid some HTML	
		?> 
			<div id="container" ><!--Opens the div product container tag-->
				<div id="pHeader" ><!--Opens the product div header-->
				   <!-- <div id="id"><?php /* display the id */ echo $p_id.'.'; ?></div>-->
					<h2 id="name"><?php /* display the name */ echo $p_name; ?></h2>
				</div><!--Closes the product div header-->
			   <!--this form action will allow users to click on the image as well as the more info link...to be directed to a details page-->
			   <!--directs user to details product page -->
			<form action="products-details.php" method="post">							
				<input type="hidden" name="detail_id" value="<?php echo $p_id; ?>" />
				<!--allow the image to be a link to its details page -->
				<input type="image" id="product_img" src="img/<?php /*dis the thumbnale image name */ echo $p_thumb; ?>" alt="<?php /*display the name*/ echo $p_name?>" /> 
			</form> 
		
			<form action="cart_update.php" method="post">		  
			  <div id="pFooter"><!--Opens div footer tag of products-->
					<div id="fill"><!--Opening of fill tag-->
						<h4><strong>Fill:</strong><?php /* diplay the fill*/ echo ' '.$p_fill; ?></h4>
					</div><!--closing of fill tag-->
					<div id="price"><!--Opening of price tag-->
						<h3><strong> $</strong><?php /* diplay the price*/ echo $p_price; ?></h3>
					</div><!--closing of price tag-->  
					</div> <!--Opens div footer tag of products-->	
			</form>
			<form action="cart_update.php" method="post"> 
				<div id="add_btn">
				<input type="text" name="product_qty" value="1" size="1" />
				<input type="submit" value="Add Item" class="add_to_cart" />
				<input type="hidden" name="id" value="<?php echo $p_id; ?>" />
				<input type="hidden" name="type" id="add" value="add" />
			   <input type="hidden" name="return_url" value="'.$current_url.'" />
				 </div><!--closes div add_btn tag -->
			  </form>
			  
			  <!--this form allows user to be directed to products details page -->		
			  <div id="more"> <!--Opens div bio tag-->
				  <form action="products-details.php" method="post" id="moreForm">
					  <input type="hidden" name="detail_id" value="<?php echo $p_id; ?>" />
					  <input type="submit" value="More Info..."  id="moreInfo"/>
				  </form>
			  </div><!--Closes div more tag-->           
         
     </div> <!--Closes the div product wrapper tag-->  
<?php	
}
}//close WHILE loop through $results
?>

</div><!--Closing Wrapper3 tag -->
<div class="col-lg-2" id="cart_new">
<?php
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//results = $mysqli->query("SELECT * FROM product_table ORDER BY id ASC");
    //if ($results) { 
	
        //fetch results set as object and output HTML
        //while($obj = $results->fetch_object())
        //{
		//}
		//}
if(isset($_SESSION["product_table"]))
{
    $total = 0;
	$cart_items = 0;
    echo '<ol>';
	$obj = $results->fetch_object();
    foreach ($_SESSION["product_table"] as $cart_itm)
    {
	$product_code = $cart_itm["id"];
		$results = $mysqli->query("SELECT name, description, price FROM product_table WHERE id='$product_code' LIMIT 1");
		  
		$obj = $results->fetch_object();
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["id"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3>'.$cart_itm["name"].'</h3>';
        echo '<div class="p-code">P ID : '.$cart_itm["id"].'</div>';
        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div class="p-price">Price :'.$currency.$obj->price.'</div>';
        echo '</li>';
        $subtotal = ($obj->price*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
    echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
}else{
    echo 'Your Cart is empty';
}
//redirect user to another page

?>
</div>
</div><!-- closes the row tag -->
             <!--start demo-->


<!---End Demo-->
</main>
</body>
</html>   