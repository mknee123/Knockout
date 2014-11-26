<?php
//bring in the function code from an external document:
include('includes/function-lib.php');
//store the footbag name that the user chose on the add-product.php
//also preventing possible evil users from attacks
$newname = rm_injections($_POST['ufootbag']);
//store price of new footbag
$newprice = rm_injections($_POST['uprice']);
$newbio = ($_POST['newdescript']);
//store fill
$newfill = rm_injections($_POST['fill']);
//allows a new number to be added to users uploaded images so i can keep track of them
$nextid = 0;
//run a query to get the highest id number currently used in the table
$results = run_my_query('
	SELECT id FROM product_table 
		ORDER BY id DESC
		LIMIT 1
		');
//pull info from $results to display a little about each product/footbag:
//set our search to the first row in $results
$results->data_seek(0);
//this loops does what's in {} to each row retrieved by the mysql query above, stopping when it runs out of rows:
while($row = $results->fetch_assoc()){
	$nextid = $row['id']+1;//stores highest row's id and add 1
}

//print_r($_FILES);
//store thumbnail image of users chose file
$newthumb = 'i'.$nextid.$_FILES['uthumb']['name'];
//copy image the user picks into folder
move_uploaded_file($_FILES['uthumb']['tmp_name'] ,'img/'.$newthumb);

//store full image of users chose file
$newfull = 'i'.$nextid.$_FILES['ufull']['name'];
//copy image the user picks into folder
move_uploaded_file($_FILES['ufull']['tmp_name'] ,'img/'.$newfull);
//run a query using on of the function from the include
run_my_query("
	INSERT INTO product_table
	VALUES
	($nextid, '$newname', $newprice, '$newfill', '$newbio','$newthumb', '$newfull' )
");


//redirect user to another page
header('Location:products.php');
?>