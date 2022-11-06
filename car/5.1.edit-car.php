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
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$id=intval($_GET['id']);
$sql="update vehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,
VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,
ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,
where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$msg="Data updated successfully";
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
	<title>Edit Vehicle Info</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/admin2.css">
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

<body style="background:url(img/c.jpg);
             background-size:100%;
             background-repeat: no-repeat;">
 <!--   <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel" ></i>
    </label>  -->
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
<h2 align='center'>Edit Vehicle</h2>		
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT vehicles.*,brands.BrandName,brands.id as bid from vehicles join brands on brands.id=vehicles.VehiclesBrand 
where vehicles.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
?>
<form method="post"  enctype="multipart/form-data">
<div class="form-group">
<label >Car Title<span style="color:red">*</span></label>
<input type="text" name="vehicletitle"  value="<?php echo htmlentities($result->VehiclesTitle)?>" required>
<label >Select Brand<span style="color:red">*</span></label>
<select  name="brandname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
<?php $ret="select id,BrandName from brands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->BrandName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }}} ?>
</select>
</div>
<div class="form-group">
<label>Price Per Day<span style="color:red">*</span></label>
<div>
<input type="text" name="priceperday"  value="<?php echo htmlentities($result->PricePerDay);?>" required>
</div>
<label >Select Fuel Type<span style="color:red">*</span></label>
<div>
<select  name="fueltype" required>
<option value="<?php echo htmlentities($results->FuelType);?>"> <?php echo htmlentities($result->FuelType);?> </option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
</div>
<label >Model Year<span style="color:red">*</span></label>
<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear);?>" required>
<label >Seating Capacity<span style="color:red">*</span></label>
<input type="text" name="seatingcapacity"  value="<?php echo htmlentities($result->SeatingCapacity);?>" required>						
<h4><b>Vehicle Images</b></h4>
Image 1 <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>"><br>Change Image 1</a><br>
Image 2<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>"><br>Change Image 2</a><br>
Image 3<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>"><br>Change Image 3</a><br>
Image 4<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>"><br>Change Image 4</a><br>
Image 5
<?php if($result->Vimage5=="")
{
echo htmlentities("File not available");
} else 
{?>
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
<?php } ?>	
Accessories
<?php if($result->AirConditioner==1)
{?>
<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
<label > Air Conditioner </label>
<?php } else { ?>
<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
<label for="inlineCheckbox1"> Air Conditioner </label>
<?php } ?>
</div>
<?php }} 
?>
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>			
</body>
</html>
<?php } ?>