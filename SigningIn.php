<html>
<body>
<?php 
include "Settings.php";
session_start();///Start a session.
header("Cache-Control:no-cache");
$Username=$_POST["Username5"];
$Password=$_POST["Password5"];
if( (!$Username) or (!$Password) )
{ header("Location:loginfail2.php"); exit(); }
$Page = "Logging In!";
$Connectect = @mysql_connect("$Host","$DatabaseLoginUsername","$DatabaseLoginPassword")
or die("<p class=pbad>Sorry but we could not establish the connection with the mysql. Please try again later.</p>");
$Result = @mysql_select_db("$DatabaseName", $Connectect)
or die("<p class=pbad>Sorry but but we could not connect to the our $SiteName database. Please try again later.</p>");
$SQL="select * from Accounts where Username=\"$Username\" and Password = \"$Password\" ";
$Result=mysql_query($SQL,$Connectect)
or die("<p class=pbad>Sorry but we could not find your account. Please try again later.</p>");
$Number = mysql_numrows($Result);
if($Number != 0)
{  
$_SESSION['Authorization'] = true; ///Set the session 'Authorization' to 'ok'
$_SESSION['AccountName'] = $Username; ///Set the session 'AccountName' to the username of the user ('$Username')
$Authorization = $_SESSION['Authorization']; ///Set the varible for the session 'Authorization'
$AccountName = $_SESSION['AccountName']; ///Set the varible for the session 'AccountName'
$Message = "You are now logged in with the account $Username";   
}
else  
{ header("Location:SingIn.php");
exit(); }
?><head><title>Logging In</title></head>

<meta http-equiv="refresh" content="5;url=index.php">
<?php
$Connect = @mysql_connect("$Host","$DatabaseLoginUsername","$DatabaseLoginPassword") or die("Sorry - unable to connect to MySQL");
$Result = @mysql_select_db("$DatabaseName",$Connect)or die("Sorry - unable to select the database") ;
$SQL = "select FirstName from Accounts where Username=\"$Username\""; 
$Result = mysql_query($SQL,$Connect); 
while ($Row = mysql_fetch_array($Result))
{
$Name = $Row["FirstName"];
$_SESSION['UserFirstName'] = $Name; ///Set the session 'UserFirstName' to '$Name'
$UserFirstName = $_SESSION['UserFirstName'];///Set the varible for the session 'UserFirstName' 
}
?>
<?php
echo "<p class=pgood>Welcome $UserFirstName - $Message</p>";
?>
<p>We will redirect you to our home page in 5 seconds.</p>
<a href="index.php"><p>If you don't like waiting click here to go to the homepage!</p></a>
</body>
</html>
