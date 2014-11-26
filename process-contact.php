<?php
//bring in the function code from an external document:
include('includes/function-lib.php');

$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = 'From: TangledDemo'; 
	$to = 'contact@mirandaknee.com'; 
	$subject = 'Hello Knockout Message';
			
	$body = "From: $name\n E-Mail: $email\n Message:\n $message";
	
	if ($_POST['submit']) {
					if (mail ($to, $subject, $body, $from)) { 
						echo '<p>Your message has been sent!</p>';
					} else { 
						echo '<p>Something went wrong, go back and try again!</p>'; 
					}
				}
				
//redirect user to another page
header('Location:products.php');
?>