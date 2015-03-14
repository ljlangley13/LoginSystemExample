<html>
<body>
<?php
include "Settings.php";
$Username=$_POST["Username"];
$Password=$_POST["Password"];
$Email=$_POST["Email"];
$FirstName=$_POST["FirstName"];
$LastName=$_POST["LastName"];
$OtherNames=$_POST["OtherNames"];
$Gender=$_POST["Gender"];
if ( (!$Username) )
{
$form.="<form action=\"$PHP_SELF\"";
$form.=" method=\"post\"><p>Your First Name:<br>";
$form.="<input type=\"text\" name=\"FirstName\"";
$form.=" value=\"$FirstName\"><br>Your Last Name:<br>";
$form.="<input type=\"text\" name=\"LastName\"";
$form.=" value=\"$LastName\"><br>Other Names:<br>";
$form.="<input type=\"text\" name=\"OtherNames\"";
$form.=" value=\"$OtherNames\"><br>Email:<br>";
$form.="<input type=\"email\" name=\"Email\"";
$form.=" value=\"$Email\"><br><br>Desired Username:<br>";
$form.="<input type=\"text\" name=\"Username\"";
$form.=" value=\"$Username\"><br><p>A secure password:<br>";
$form.="<input type=\"password\" name=\"Password\"";
$form.=" value=\"$Password\"><br><p>Gender:<br>";
$form.="<input type=\"radio\" name=\"Gender\" value=\"M\"/> Male";
$form.="<input type=\"radio\" name=\"Gender\" value=\"F\"/> Female<br><br>";
$form.="<input type=\"submit\" value=\"Sign Up\">";
$form.="</form>";
echo($form); 
}
else 
{ $Connect = @mysql_connect("$Host","$DatabaseLoginUsername","$DatabaseLoginPassword")
or die("<p class=pbad>The connection with MySQL failed. Please try again.</p>");
$Database = @mysql_select_db("$DatabaseName",$Connect)
or die("<p class=pbad>The connection to the database failed. Please try again.</p>");
$SQL = "insert into Accounts (Username,Password,Email,FirstName,LastName,OtherNames,Gender) values(\"$Username\",\"$Password\",\"$Email\",\"$FirstName\",\"$LastName\",\"$OtherNames\",\"$Gender\")";
$Result = @mysql_query($SQL,$Connect);  
if($Result) {
echo("
<p class=\"pgood\">Thank you $FirstName, You have successfully signed up.</p>"); 
}
else 
{
$NoSQLError=mysql_errno();
if($NoSQLError!=0)
{
// error occurred
$SQLError=mysql_error();
echo ("<p class=\"pbad\">Sorry there was a error making your account. Information follows:");
echo ("<p class=\"pbad\">Error Number: $NoSQLError <br>$SQLError");
die ("<br><br>Please try again and remember that a username and email address may only be used once.</p><a href=\"new.php\"><p>Click here to refresh</p></a>");
}
}
}
?>