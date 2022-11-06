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
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Requests</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    <h1 align="center"> Booking Requests </h1><br><br>
    <table border="1" align="center" width="600" cellpadding="1" cellspacing="1">
        <tr>
            <th> <font size='5' face='arial' color='green'> Sl no. </font></th>
            <th> <font size='5' face='arial' color='green'> Name </font></th>
            <th> <font size='5' face='arial' color='green'> Phone </font></th>
            <th> <font size='5' face='arial' color='green'> Car </font></th>
            <th> <font size='5' face='arial' color='green'> Date </font></th>
            <th> <font size='5' face='arial' color='green'> Slot </font></th>
            <th> <font size='5' face='arial' color='green'> Action </font></th>
        </tr>
<?php $sql = "SELECT * from  bookingtable ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				
?>											
<tr>
				<td><?php echo htmlentities($cnt);?></td>
				<td><?php echo htmlentities($result->name);?></td>
				<td><?php echo htmlentities($result->phone);?></td>
				<td><?php echo htmlentities($result->car);?></td>
                <td><?php echo htmlentities($result->date);?></td>
                <td><?php echo htmlentities($result->slot);?></td>
                <td><a href="# id=<?php echo $result->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="# ?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-archive"></i></a></td>
</tr>
<?php $cnt=$cnt+1; 
}} 
?>                                       
</tr>
</table>
</div>
</div>
</div>
</div>
</table>
</body>
</html>