<?php
/**
***Function Library: common function 
***all the documents will import
***
***@package mirandafunctions
***@author Miranda Knee
***@copyright 2014 Miranda Knee
**/
/**
***function that cleans strings
***disabling code injections
***
** @param $userstring  the character we want to clean
** @return $cleanstring same character, all clean (or empty)
**/
////// a function we'll run on user input to prevent nasty security breaches
 function rm_injections($userstring){
 //Prepare an empty string. If it gets returned below, it won't give them security clearance.
   $cleanstring = '';
    if (isset($userstring)) {
       //trim space from left or right:
       $userstring = trim($userstring);
       //replace the empty string with the value the user typed if it contains non-quote characters (We're now confident it's clean):
       if (preg_match('/^[a-zA-Z0-9^$.*+\[\]{,}]{1,24}$/u', $userstring)){ 
          $cleanstring = $userstring;
       } 
    }
    //return the clean string (or the original empty string if it was dangerous).
    return $cleanstring;
 } 
 $currency = '$'; //Currency sumbol or code

$db_username = 'mirandak_boss';
$db_password = 'boss12';
$db_name = 'mirandak_finaldatadb';
$db_host = 'localhost';
$mysqli = new mysqli('localhost','mirandak_boss', 'boss12', 'mirandak_finaldatadb');
/**
 * function that runs any mysql querty & returns results
 * @param $q           the particular query we want to run
 * @return $results   the results of the query as an array
 */
 function run_my_query($q){
//retrieve and store information from the database so we can display it below in BODY:

//1. Make CONNECTION to server and database. mysqli() takes 4 arguments: (servername, username, password, databasename)
$mysqli = new mysqli('localhost','mirandak_boss', 'boss12', 'mirandak_finaldatadb');
//if there was an error with the previous line...
if($mysqli->connect_errno){
	//show me a custom message
	echo 'Failed to connect to server/db! '.$mysqli->connect_errno;
	die();//stops running code on this page
}
//2. run a mysql query, store the retrieve results in an object called $results.  If something goes wrong, die() makes its stop running code
$results =$mysqli->query($q) or die($q.'Problem with my Query!'.$mysqli->error);
//3. close the CONNECTION
mysqli_close($mysqli);
  //return the result to where the function is called:
  return $results;
}//ends my function  run_my_query()
?>