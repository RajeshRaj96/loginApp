<?php 

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Login Form</title>

<Link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

<meta name="theme-color" content="#563d7c">

</head>
<body class="text-center">

<form class="form-signin" method="post" id="loginForm" action="index.php">

<?php
session_start();
if((isset($_SESSION["error"])))
{
    echo '<p class="text-danger mb-5">Something went wrong, please try agin later</p>';
    session_destroy();
}
if((isset($_SESSION["incorrect"])))
{
    echo '<p class="text-danger mb-5">Email or Password Incorrect.</p>';
    session_destroy();
}


/*Login Functionality*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
$_SESSION["error"] = "error";
header("Location: index.php");
die();
}
function loginFunction($insertId) {
  setcookie("current", "", time() - 3600);
  setcookie("current", $insertId, time() + (86400 * 30));
  header("Location: profile.php");
  die();
}
function checkAccoundExist($email, $pass, $type){
  global $conn;
  $existQuery = "SELECT `id` FROM `user` WHERE `email`= '$email' AND `password`= '$pass'";
  $exist = $conn->query($existQuery);

  if($exist->num_rows != 0)
  {
    $query = $exist->fetch_assoc();
    loginFunction($query['id']);
  }else if($type === 'google'){
    $insertQuery = "INSERT INTO `user`(`name`,`email`,`phone_number`,`street`,`country`,`gender`,`password`) VALUE ('$name', '$email', '', '', '', '', '$pass')";
    $result = $conn->query($insertQuery);
    $last_id = $conn->insert_id;
    loginFunction($last_id);
  }else{
    $_SESSION["incorrect"] = "incorrect";
    header("Location: index.php");
    die();
  }
}
/*Login Functionality*/


/*Google Login*/
include('redirect.php'); 

if((isset($_POST['email'])) && (isset($_POST['password']))){
  $email = $_POST['email'];
  $pass = $_POST['password'];
  checkAccoundExist($email, $pass, '');
}

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $pass = '123456';
  checkAccoundExist($email, $pass, 'google');

} 
/*Google Login*/
?>

<div class="contentShareBtn">
<a href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.example.com&title=LoginApp" target="_blank"><i class="fa fa-linkedin"></i> Share Content</a>
</div>

<h1 class="h3 mb-5 font-weight-normal">Sign in</h1>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" class="form-control" placeholder="Email address" name="email">
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" name="password" class="form-control" placeholder="Password">
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<p class="mt-2 mb-2 text-muted">Don't have an account register <a href="register.php"> here</a></p>
<?php 
if (!isset($_GET['code'])){
  echo "<p><span class='text-muted'>or login with</span><br><br><a href='".$client->createAuthUrl()."' class='googleButton'><i class='fa fa-google'></i></a></p>";
}
?>
</form>


<script src="js/jquery.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
   jQuery(document).ready(function($)
   {
    $("#loginForm").validate({
        rules: {
            email: {
                required: !0
            },
            password: {
                required: !0,
                minlength: 6
            },
        },
        submitHandler: function(e) {
            $("#loginForm").submit();
        }
    })
   }); 
</script>

</body>
</html>
