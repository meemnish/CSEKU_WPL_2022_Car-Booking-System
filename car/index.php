<?php
session_start();


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

if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
} else{

  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>rentandride | Admin Login</title>
	<link rel="stylesheet" href="css/style2.css">
</head>

<body style="background:url(img/b.jpg);
             background-size:100%;
             background-repeat: no-repeat;">

		<div class="form-content">
			<div class="container">
				<div class="row">
						<h1>Sign in</h1>
								<form method="post">
									<label for="">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">
									<label for="" >Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									<button name="login" type="submit">LOGIN</button>
								</form>
			</div>
		</div>
	</div>
</body>

</html>
