<?php
$con=mysqli_connect('localhost','root','wamp1234');
mysqli_select_db($con,'car');
$sql="SELECT * FROM usertable";
$records=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body style="background:url(img/c.jpg);
             background-size:100%;
             background-repeat: no-repeat;">
<!--<input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel" ></i>
    </label>-->
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
    <h1 align="center"> Registered users </h1>
    <table align="center" width="600"  border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th> <font size='5' face='arial' color='green'> Username</font></th>
            <th> <font size='5' face='arial' color='green'> Password</font></th>
</tr>

<?php
        while ($user=mysqli_fetch_assoc($records))
        {
            echo"<tr>";
            echo"<th>".$user['name']."</th>";
            echo"     ";
            echo"<th>".$user['password']."</th>";
            echo"</tr>";
            echo"<br>";
        }
        ?>
        </table>
        </body>
</html>