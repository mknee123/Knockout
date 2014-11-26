<?php
session_start();
include_once("includes/function-lib.php");

//empty cart by destroying current session
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); //return url
	session_destroy();
	header('Location:'.$return_url);
}

//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$product_code 	= filter_var($_POST["id"], FILTER_SANITIZE_STRING); //product code
	$product_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product quanity
	$return_url 	= base64_decode($_POST["return_url"]); //return url
	
	//limit quantity for single product
	if($product_qty > 10){
		die('<div align="center">This demo does not allowed more than 10 quantity!<br /><a href="http://sanwebe.com/assets/paypal-shopping-cart-integration/">Back To Products</a>.</div>');
	}

	//MySqli query - get details of item from db using product code
	$results =$mysqli->query("SELECT name, price FROM product_table WHERE id ='$product_code' LIMIT 1");
	$row = $results->fetch_assoc();
	$obj = $results->fetch_object();
	 //$results->data_seek(0);
	
    if ($results) {
    //this loops does what's in {} to each row retrieved by the mysql query above, stopping when it runs out of rows:
 			
		
		//prepare array for the session variable
		$new_product = array(array('name'=>$row['name'], 'id'=>$product_code, 'qty'=>$product_qty, 'price'=>$row->price));
		
		if(isset($_SESSION["product_table"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["product_table"] as $cart_itm) //loop through session array
			{
				if($cart_itm["id"] == $product_code){ //the item exist in array

					$product[] = array('name'=>$cart_itm["name"], 'id'=>$cart_itm["id"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('name'=>$cart_itm["name"], 'id'=>$cart_itm["id"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["product_table"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["product_table"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["product_table"] = $new_product;
		}
		
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["product_table"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url 	= base64_decode($_GET["return_url"]); //get return url

	
	foreach ($_SESSION["product_table"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["id"]!=$product_code){ //item does,t exist in the list
			$product[] = array('name'=>$cart_itm["name"], 'id'=>$cart_itm["id"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		}
		
		//create a new product list for cart
		$_SESSION["product_table"] = $product;
	}
	
	//redirect back to original page
	//header('Location:'.$return_url);
	//redirect user to another page
header('Location:products.php');
}
?>