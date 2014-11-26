<?php
session_start();
//store in a var the username the user typed
$theirusername = $_POST['uusername'];
//store in a var the password the user typed
$theirpassword = $_POST['upass'];
//include run_my_query function defintion
//bring the function code from an external document:
include('includes/function-lib.php');
//use the password in a query to see if ther's anyone in the mySQL user table with that:
$results = run_my_query("SELECT * FROM users_table WHERE password = \"$theirpassword\" AND username =\"$theirusername\"");
//if it found such a user in the user table...
//pull info from $results to display a little about each product/superpower:
//set our search to the first row in $results
$results->data_seek(0);
//this loops does what's in {} to each row retrieved by the mysql query above, stopping when it runs out of rows:
if($row = $results->fetch_assoc()){
	//...save some info about ther user
	//echo "valid user";
	session_start();
	//echo session_id();
	//save info about user
	$_SESSION['logged_in']=true;
	$_SESSION['uname'] = $row['username'];
	$_SESSION['priv']= $row['privilege'];
	//and redirect user all powers page
	header('Location:products.php');
//if no such user in table
}else{
	//echo 'No valid user';
	//....send them back to login with querystring to trigger some text feedback there	
	header('Location:login.php?error=invalid');
}
?>