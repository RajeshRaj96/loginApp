<?php

$name = $_POST['fname'];
$email = $_POST['email'];
$street = $_POST['street'];
$number = $_POST['number'];
$country = $_POST['country'];
$pass = $_POST['password'];
$gender = $_POST['gender'];

date_default_timezone_set('Asia/Kolkata');

session_start();
//Mysql Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
$_SESSION["error"] = "error";
header("Location: register.php");
die();
}
//Mysql Connection

$prsentQuery = "SELECT `id` FROM `user` WHERE `email`= '$email'";
$present = $conn->query($prsentQuery);

if($present->num_rows != 0)
{
    $_SESSION["already"] = "already";
    header("Location: register.php");
    die();
}
    
$insertQuery = "INSERT INTO `user`(`name`,`email`,`phone_number`,`street`,`country`,`gender`,`password`) VALUE ('$name', '$email', '$number', '$street', '$country', '$gender', '$pass')";

$result = $conn->query($insertQuery);

if($result)
{
    $_SESSION["success"] = "success";
    header("Location: register.php");
    die();
}
else{
    $_SESSION["error"] = "error";
    header("Location: register.php");
    die();
}

?>