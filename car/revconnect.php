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

if(isset($_POST['email']))
    $email = $_POST['email'];
    echo "Email: ";
    echo $email;
    echo"<br>";

if(isset($_POST['date']))
    $date = $_POST['date'];
    echo "Date: ";
    echo $date;
    echo"<br>";

if(isset($_POST['review']))
    $review = $_POST['review'];
    echo "Review: ";
    echo $review;
    echo"<br>";
    echo "Review sent successfully.";

$s="select * from review where name='$name'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

    $reg="INSERT INTO `review`(`name`, `email`, `date`, `review`) VALUES ('$name','$email','$date','$review')";
    mysqli_query($con,$reg);
    
?>

<html>
    <a href="index2.php">Go to homepage</a>
    </html>