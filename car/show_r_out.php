<?php
$con=mysqli_connect('localhost','root','wamp1234');
mysqli_select_db($con,'car');
$sql="SELECT * FROM review";
$records=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="css/display_records.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body style="background:url(img/c.jpg);
             background-size:100%;
             background-repeat: no-repeat;">

    <h1 align="center"> Review </h1>
    <table align='center' width="600"  border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th> <font size='5' face='arial' color='green'> Name </font></th>
            <th> <font size='5' face='arial' color='green'> Email </font></th>
            <th> <font size='5' face='arial' color='green'> Date </font></th>
            <th> <font size='5' face='arial' color='green'> Review </font></th>
        </tr>
<?php
        while ($user=mysqli_fetch_assoc($records))
        {
            echo"<tr>";
            echo"<th>".$user['name']."</th>";
            echo"     ";
            echo"<th>".$user['email']."</th>";
            echo"     ";
            echo"<th>".$user['date']."</th>";
            echo"     ";
            echo"<th>".$user['review']."</th>";
            echo"     ";
            echo"</tr>";
            echo"<br>";
        }
        ?>
        </table>
        <p align='center'> <font size='3' face='arial' text color='white'>  <a href="userindex.php"><h2 align='center'><br><br>Back to homepage</h2></a></p>
   </body>
</html>