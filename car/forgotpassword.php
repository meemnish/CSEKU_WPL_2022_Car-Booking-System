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

if(isset($_POST['update']))
{
$name=$_POST['name'];
$newpassword=($_POST['newpassword']);
$sql ="SELECT name FROM usertable WHERE name=:name";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update usertable set Password=:newpassword where name=:name";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':name', $name, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div id="forgotpassword">
  <div role="document">
    <div>
      <div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3>Password Recovery</h3>
      </div>
      <div>
        <div class="row">
          <div>
            <div>
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Your username*" required="">
                </div>
  <div class="form-group">
        <input type="password" name="newpassword" class="form-control" placeholder="New Password*" required="">
  </div>
  <div class="form-group">
        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" required="">
  </div>
   <div class="form-group">
        <input type="submit" value="Reset My Password" name="update" class="btn btn-block">
  </div>
      </form>
  <div>
      <p><a href="login.php" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>