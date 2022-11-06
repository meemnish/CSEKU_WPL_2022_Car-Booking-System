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
error_reporting(0);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Reservation Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="css/style2.css" rel="stylesheet">
  </head>


  <body display="flex" justify-corner="center" 
             style="background:url(img/c.jpg);
             background-size:100%;
             background-repeat: no-repeat;">

    <h1 align="center" >RESERVATION</h1>
    <form id="resForm" method="post" target="_self" action="connect.php">
      <label for="name" name="name">Name</label>
      <input type="text" required name="name" placeholder="Enter your name here"/>

      <label for="phone">Phone</label>
      <input type="text" required name="phone" placeholder="Enter your phone number"/>

      <label>Car</label>
      <select name="car">
        <option value="Marcedes-Benz">Marcedes-Benz</option>
        <option value="SUV">SUV</option>
        <option value="Toyota">Toyota</option>
        <option value="Audi">Audi</option>
        <option value="Kia Sportage">Kia Sportage</option>
        <option value="Hyundai Veloster">Hyundai Veloster</option>
      </select>
      <?php
      $mindate = date("Y-m-d");
      ?>
      <label>Reservation Date</label>
      <input type="date" required id="date" name="date"
             min="<?=$mindate?>">

      <label>Reservation Slot</label>
      <select name="slot">
        <option value="AM">AM</option>
        <option value="PM">PM</option>
      </select>

      <input type="submit" value="Submit"/>
    </form>
  </body>
</html>
