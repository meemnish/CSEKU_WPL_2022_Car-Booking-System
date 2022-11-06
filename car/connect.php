<?php

//session_start();
//header('location:index.html');

$con=mysqli_connect('localhost','root','wamp1234');

mysqli_select_db($con,'car');

if(isset($_POST['name']))
    $name = $_POST['name'];
    echo "Name: ";
    echo $name;
    echo"<br>";

if(isset($_POST['phone']))
    $phone = $_POST['phone'];
    echo "Phone: ";
    echo $phone;
    echo"<br>";

if(isset($_POST['car']))
    $car = $_POST['car'];
    echo "Car: ";
    echo $car;
    echo"<br>";

if(isset($_POST['date']))
    $date = $_POST['date'];
    echo "Date: ";
    echo $date;
    echo"<br>";

if(isset($_POST['slot']))
    $slot = $_POST['slot'];
    echo "Slot: ";
    echo $slot;
    echo"<br>";
    echo "Request is sent successfully.";

//$name=$_POST['name'];
//$phone=$_POST['phone'];
//$car=$_POST['car'];
//$date=$_POST['date'];
//$slot=$_POST['slot'];

$s="select * from bookingtable where name='$name'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
    $reg="INSERT INTO `bookingtable`(`name`, `phone`, `car`, `date`, `slot`) VALUES ('$name','$phone','$car','$date','$slot')";
    mysqli_query($con,$reg);
    
?>

<html>
    <a href="index2.php">Go to homepage</a>
    </html>