<?php
session_start();
error_reporting(0);
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','wamp1234');
define('DB_NAME','car');

try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

if(!empty($_POST["emailid"])) 
{
$email= $_POST["emailid"];
if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) 
{
	echo "error : You did not enter a valid email.";
}
else 
{
$sql ="SELECT EmailId FROM users WHERE EmailId=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Email already exists .</span>";
echo "<script>$('#submit').prop('disabled',true);</script>";
} 
else
{
echo "<span style='color:green'> Email available for Registration .</span>";
echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>
