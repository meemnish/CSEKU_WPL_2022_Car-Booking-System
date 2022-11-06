<?php 
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
<html>
  <head>
    <title>Add Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="css/style2.css" rel="stylesheet">
  </head>
  <body display="flex" justify-corner="center" 
             style="background:url(img/c.jpg);
             background-size:100%;
             background-repeat: no-repeat;">
    <form id="resForm" method="post" target="_self" action="revconnect.php">
    <br>
      <br>
      <br>
      <br>
      <label for="name" name="name">Name</label>
      <input type="text" required name="name" placeholder="Enter name"/>
      <label for="phone">Email</label>
      <input type="email" required name="email" placeholder="Enter email"/>
      <label>Select Brand&emsp;&emsp;&nbsp;<span style="color:red">*</span></label>
<select name="brandname" required>
<option value=""> Select </option>
<?php $ret="select id,BrandName from brands";
$query= $dbh -> prepare($ret);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php 
}} 
?>
</select>
      <label for="phone">Date</label>
      <input type="date" required name="date" placeholder="Enter date"/>
      <label for="phone">Review</label>
      <input type="text" required name="review" placeholder="Write your review"/>
      <input type="submit" value="Submit"/>
    </form>
  </body>
</html>


