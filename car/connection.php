<?php
mysqli_connect("localhost", "root", "wamp1234", "car");
if(mysqli_connect_error())
{
    echo "Cannot connect!";
}
?>