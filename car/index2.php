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
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title> User Homepage </title>
</head>

<body> 
<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>
    <a href="#" class="logo"> <span>Rent</span> & Ride</a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#services">services</a>
        <a href="#featured">featured</a>
        <a href="#contact">contact</a>
        <a href="reservation.php">Book-a-car</a>
    </nav>
    <div id="login-btn">
    <a href="userindex.php" class="btn">Logout</a>
        <i class="far fa-user"></i>
    </div>
</header>  
</div>

<section class="home" id="home">
    <h3>rent any car</h3>
    <img src="img/home.jpg" height=450 width=70% alt=""> 
    <a data-speed="7" href="review.php" class="btn home-parallax">Write a review</a>
</section>

<section class="icons-container">
    <div class="icons">
        <i class="fas fa-home"></i>
        <div class="content">
            <h3>5</h3>
            <p>branches</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>200+</h3>
            <p>happy clients</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>20+</h3>
            <p>cars</p>
        </div>
    </div>

</section>

<section class="featured" id="featured">
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2 >Find the Best <span>Car For You</span></h2>
      <p font ='10'>Find your desired car at an affordable rate and enjoy your journey!</p>
    </div>
    <div class="row"> 
      
<?php $sql = "SELECT vehicles.VehiclesTitle,brands.BrandName,vehicles.PricePerDay,vehicles.FuelType,
vehicles.ModelYear,vehicles.id,vehicles.SeatingCapacity,vehicles.VehiclesOverview,vehicles.Vimage1,
vehicles.Vimage2,vehicles.Vimage3,vehicles.Vimage4 from vehicles join brands on brands.id=vehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  
<p "font size:20px"><br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NEW CAR:</p>
<div>
<div class="recent-car-list">
<div class="car-info-box">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" height="250px" width="400px"></a>
<div class="car-info-box">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" height="250px" width="400px"></a>
<div class="car-info-box">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" height="250px" width="400px"></a>
<div class="car-info-box">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive" alt="image" height="250px" width="400px"></a>
<ul>
<li><p "font size:20px">&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-car" aria-hidden="true"></i>NEW CAR:&emsp;on&nbsp;<?php echo htmlentities($result->FuelType);?></p></li>
<li><p "font size:20px">&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</p></li>
<li><p "font size:20px">&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</p></li>
</ul>
</div>
<div class="car-title-m">
<h6><p "font size:20px">&emsp;&emsp;&emsp;&emsp;&emsp;<a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></p></a></h6>
<span class="price"><p "font size:20px">&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo htmlentities($result->PricePerDay);?>/Day</p></span> 
</div>
</div>
</div>
<?php
}}
?>
</div>
</div>
</div>
</section>
</section>
<section class="services" id="services">
    <h1 class="heading"> our <span>services</span> </h1>
    <div class="box-container">
        <div class="box">
            <i class="fas fa-car"></i>
            <h3>Honesty</h3>
            <p>no hidden fees | no credit card fees | no amendment fees | book directly through supplier</p>
        </div>
        <div class="box">
            <i class="fas fa-tools"></i>
            <h3>Speciality</h3>
            <p>clean cars | flexible bookings | experienced and well mannered drivers | best cars at affordable price</p>
        </div>
        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>24/7 support</h3>
            <p>one of the best technical team in business | reach us 24/7 on our mobile numbers </p>
        </div>
    </div>
</section>
</section>
</section>
<section class="contact" id="contact">
    <h1 class="heading"><span>contact</span> us</h1>
    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.997502144319!2d90.40880081495395!3d23.747468484590826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b889b69364e5%3A0xe36bf3ceb9b1394d!2sW%20Malibagh%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1663146619100!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <form action="">
            <h3>About us</h3>
            <h2>Rent & Ride now has a new face. After more than 5 years in business, we decided to give a fresher look to our brand and our services. 
                With our fully renewed fleet of vehicles, we are ready to meet all expectations and requirements.<br><br>
                renandride.com is a trading name of Booking.com Transport Limited which is a limited company registered in Bangladesh (Number: 01823363300) 
                whose registered address is at 189, Malibag DIT Road, Dhaka-1217 and VAT number: GB 855349007.
            </h2>
            <p align='center'> <font size='5' face='arial' text color='white'>  <a href="show_review.php"><h5> See the reviews </h5></a></p>
        </form>
    </div>
</section>
<section class="footer" id="footer">
    <div class="box-container">
        <div class="box">
            <h3>our branches</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Dhaka </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Rajshahi </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Chittagong </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Cox's Bazar </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Sylhet </a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> contact </a> 
        </div>
        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +880-1823363300 </a>
            <a href="#"> <i class="fas fa-phone"></i> +880-1234567890 </a>
            <a href="#"> <i class="fas fa-envelope"></i> rentandride@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> 189, Malibag DIT Road, Dhaka-1217 </a>
        </div>
        <div class="box">
            <h3>Also find us on</h3>
            <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="https://twitter.com/i/flow/login"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="https://www.instagram.com/accounts/login/"> <i class="fab fa-instagram"></i> instagram </a>
        </div>
    </div>
    <div class="credit">Copyright &copy; 2022 rentandride | All Rights Reserved </div>
</section>
</body>
</html>