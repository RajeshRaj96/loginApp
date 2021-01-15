<?php

$userId = $_COOKIE['current'];
if(!$userId)
{
    header("Location: index.php");
    die();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
$_SESSION["error"] = "error";
header("Location: index.php");
die();
}

$prsentQuery = "SELECT * FROM `user` WHERE `id`= '$userId'";
$present = $conn->query($prsentQuery);
$query = $present->fetch_assoc();
// print_r($query);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Profile Page</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">
<meta name="theme-color" content="#563d7c">

</head>
<body>
 
<div class="container">
<div class="jumbotron">
<h1>Hi <?php echo $query['name']; ?>,</h1>
<!-- <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p> -->
<ul class="list-group mt-5 mb-5">
  <li class="list-group-item">Email : <?php echo $query['email']; ?></li>  
  <li class="list-group-item">Phone Number : <?php echo $query['phone_number']; ?></li>  
  <li class="list-group-item">Street : <?php echo $query['street']; ?></li>  
  <li class="list-group-item">Country : <?php echo $query['country']; ?></li>  
  <li class="list-group-item">Gender : <?php echo $query['gender']; ?></li>  
</ul>

<p><a class="btn btn-success" href="logout.php" role="button">Logout</a></p>
</div>
</div>

   
  
</body>
</html>
