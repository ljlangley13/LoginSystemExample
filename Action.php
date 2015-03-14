<?php
include "Settings.php"; 
session_start();///Start a session. 
$Authorization = $_SESSION['Authorization'];///Set the 'Authorization' variable. 
$AccountName = $_SESSION['AccountName'];///Set the 'AccountName' variable. 
$UserFirstName = $_SESSION['UserFirstName'];///Set the 'UsesName' variable. 
///Start of how to test if that worked: 
echo "Authorization = $Authorization AccountName = $AccountName UserFirstName = $UserFirstName";
///End of how to test if that worked. 
if($Authorization != "true" )///If the variable 'Authorization' does not equal true the following will run...
{ 
header("location:index.php" ); exit(); ///Send the user to the index page.
}
?> 