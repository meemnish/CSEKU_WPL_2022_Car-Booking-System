<?php

session_start();
header('location:userindex.php');

$con=mysqli_connect('localhost','root','wamp1234');

mysqli_select_db($con,'car');

$name=$_POST['user'];
$pass=$_POST['password'];
$s="select * from usertable where name='$name'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num>0){
    echo 'alert("username already taken")';
}
else
{
    $reg="insert into usertable(name,password) values ('$name' , '$pass')";
    mysqli_query($con,$reg);
    echo"Registration successful";
}

?>