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

if(strlen($_SESSION['alogin'])==0)
{	
header('location:index.php');
}
else
{
if(isset($_POST['submit']))
{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else 
{
$error="Your current password is not valid.";	
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
	<meta name="theme-color" content="#3e454c">
	<title>Change Password</title>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match!!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  <style>
.errorWrap 
{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap
{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
	</style>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="css/admin.css">
</head>

<body style="background:url(img/c.jpg);
             background-size:100%;
             background-repeat: no-repeat;">
    <input type="checkbox" id="check">
 <!--   <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel" ></i>    -->
    </label>
    <div class="slidebar">
        <header><i class='fas fa-user-secret' style='font-size:40px'></i>&ensp;Admin</header>
        <ul>
		    <li class="employee"><a href="1.dashboard.php"><i class="fas fa-user-tie"></i>Dashboard</a></li>
            <li class="employee"><a href="2.create-brand.php"><i class="fas fa-user-tie"></i>Create brand</a></li>
            <li class="employee"><a href="3.manage-brands.php"><i class="fas fa-user-tie"></i>Manage brands</a></li>
            <li class="employee"><a href="4.add-car.php"><i class="fas fa-user-tie"></i>Add a car</a></li>
            <li class="employee"><a href="5.manage-cars.php"><i class="fas fa-user-tie"></i>Manage cars</a></li>
            <li class="employee"><a href="display_booking.php"><i class="fas fa-calendar-week"></i>Manage bookings</a></li>
            <li class="employee"><a href="display_records.php"><i class="fas fa-calendar-week"></i>Registered users</a></li>
            <li class="employee"><a href="logout.php"><i class='fas fa-sign-out-alt' style='font-size:24px'></i>Log Out</a></li>
            <li class="employee"><a href="userindex.php"><i class='fas fa-sign-out-alt' style='font-size:24px'></i>Go to main page</a></li>
        </ul>    
    </div>

	<h2 align=center>Change Password</h2>
	<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
	<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
	else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<div class="form-group">
	<label > &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Current Password</label>
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<input type="password" class="form-control" name="password" id="password" required>
	</div>
	</div>
	<div class="form-group">
	<label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;New Password</label>
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<input type="password" class="form-control" name="newpassword" id="newpassword" required>
	</div>
	</div>
	<div class="form-group">
	<label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Confirm Password</label>
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
	</div>
	</div>
	<div class="form-group">
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
	</div>
	</div>
	</form>
</body>
</html>
<?php 
} 
?>