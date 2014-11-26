<?php
//the id of which product to show starts off as a default:
$chosen_id = 1;
//before it runs the query, replace that id # with the one the user chose, if user clicked on of the footbag products pg
if (isset($_POST['detail_id'])){
	$chosen_id=$_POST['detail_id'];
}
//bring in the function code from an external document:
include('includes/function-lib.php');
//run a query using on of the function from the include
$results = run_my_query('DELETE FROM product_table WHERE id='.$chosen_id);

//redirect user to another page
header('Location:products.php');
?>