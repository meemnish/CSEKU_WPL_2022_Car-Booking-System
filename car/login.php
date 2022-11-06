<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login and Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>

<body style="background:url(img/b.jpg);
             background-size:100%;
             background-repeat: no-repeat;">
    <div class="Container">
    <div class="login-box">
        <div class="row">
            <div class="column">
            <div class="login-left">
                <h2> Login here </h2>
                <form action="validation.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" required placeholder="enter your username">
                        </div>
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="****">
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>

<div class="column">
<div class="login-right">
         <h2> Register here </h2>
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user"  class="form-control" required placeholder="enter username" >
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password"  class="form-control" required placeholder="*****">
                    </div>
<button type="submit" class="btn btn-primary" onclick="openPopup()">Register</button>
<div class="popup">
    <h2> Thanks for registering.</h2>
    <p>Registration successful</p>
    <button type="button" onclick="closePopup()">OK</button>
</div>
</form>
</div>
</div>
<p align='center'> <font size='5' face='arial' text color='white'> <br> <a href="forgotpassword.php"><h3 align="center">Forgot your password?</h3></a></p>
<p align='center'> <font size='5' face='arial' text color='white'> <a href="index.php"><h3 align="center">Login as an admin</h3></a></p>
</div>
</div>
<script>
let popup=document.getElementById("popup");
function openPopup()
{
    popup.classlist.add("open-popup");
}
function closePopup()
{
    popup.classlist.remove("open-popup");
}
</script>
</body>
</html>