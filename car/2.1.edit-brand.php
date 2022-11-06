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
$brand=$_POST['brand'];
$id=$_GET['id'];
$sql="update  brands set BrandName=:brand where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);            //scope resolution operator
$query->execute();
$lastInsertId = $dbh->lastInsertId();
$msg="Brand updted successfully";
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
	<title>Edit Brand</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="css/admin.css">
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

</head>

<body style="background:url(img/b.jpg);
             background-size:100%;
             background-repeat: no-repeat;">

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
	
<div class="row">
<h2 align='center'>Update Brand</h2>
<div class="row">
<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php	
$id=$_GET['id'];
$ret="select * from brands where id=:id";
$query= $dbh -> prepare($ret);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>

	<div class="form-group">
	<label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Brand Name</label>
	<div>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<input type="text" class="form-control" value="<?php echo htmlentities($result->BrandName);?>" name="brand" id="brand" required>
			</div>
			</div>
			<div class="hr-dashed"></div>
											
	<?php }} ?>
	<div class="form-group">
	<div>
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<button class="btn btn-primary" name="submit" type="submit">Submit</button>
	</div>
	</div>
	</form>
	</div>
	</div>
	</div>
	</div>
	</div>
</body>
</html>
<?php } ?>