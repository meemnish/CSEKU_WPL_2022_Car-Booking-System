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
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
$airconditioner=$_POST['airconditioner'];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);

$sql="INSERT INTO vehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner) 
VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner)";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Vehicle posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>Add a car</title>
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
	<h2 align='center'>Add a car</h2>					
<?php if($error){?><div><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>									
<form method="post"  enctype="multipart/form-data">
<label>Car Title<span style="color:red">*</span></label>
&emsp;&emsp;&emsp;&emsp;
<input type="text" name="vehicletitle"  required>
<br>
<label>Select Brand&emsp;&emsp;&nbsp;<span style="color:red">*</span></label>
<select name="brandname" required>
<option value=""> Select </option>
<?php $ret="select id,BrandName from brands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

</select>
<br>								
<label>Car Overview<span style="color:red">*&emsp;&emsp;&nbsp;</span></label>
<textarea name="vehicalorcview" required></textarea><br>
<label>Price Per Day<span style="color:red">*&emsp;&emsp;&nbsp;</span></label>
<input type="text" name="priceperday" required><br>
<label >Select Fuel Type<span style="color:red">*&nbsp;</span></label>
<select name="fueltype" required><br>
<option value=""> Select </option>
<option value="Petrol">Petrol</option>
<option value="Octane">Octane</option>
<option value="CNG">CNG</option>
</select>
<br>
<div class="form-group">
<label>Model Year<span style="color:red">*&emsp;&emsp;&emsp;&nbsp;</span></label>
<input type="text" name="modelyear"  required><br>
<label>Seating Capacity<span style="color:red">*&emsp;&nbsp;</span></label>
<input type="text" name="seatingcapacity" required><br>
<h4><b>Upload Images</b></h4><br>
Image 1<span style="color:red">*&emsp;&nbsp;</span><input type="file" name="img1" required><br>
Image 2<span style="color:red">*&emsp;&nbsp;</span><input type="file" name="img2" required><br>
Image 3<span style="color:red">*&emsp;&nbsp;</span><input type="file" name="img3" required><br>
Image 4<span style="color:red">*&emsp;&nbsp;</span><input type="file" name="img4" required><br>
Image 5&emsp;&nbsp;&nbsp;&nbsp;<input type="file" name="img5">
<label for="airconditioner"><br> Air Conditioner </label>
<input type="checkbox" id="airconditioner" name="airconditioner" value="1"><br>
&emsp;&nbsp;&nbsp;&nbsp;<button  type="reset">Cancel</button>
&emsp;&nbsp;&nbsp;&nbsp;<button name="submit" type="submit">Save changes</button>					
</body>
</html>
<?php } 
?>