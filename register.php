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
    <title>Register Form</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

<meta name="theme-color" content="#563d7c">

</head>
<body class="text-center">

<?php
session_start();

?>
<form class="form-signin" id="registerForm" action="register_submit.php" method="post">
<?php
if(isset($_SESSION["success"]))
{
    echo '<p class="text-success mb-5">Successfully Resgitered please login</p>'; 
    session_destroy();   
}
else if((isset($_SESSION["error"])))
{
    echo '<p class="text-danger mb-5">Something went wrong, please try agin later</p>';
    session_destroy();
}
else if((isset($_SESSION["already"])))
{
    echo '<p class="text-danger mb-5">Email already exist, please resgiter with defferent account.</p>';
    session_destroy();
}
?>
<h1 class="h3 mb-5 font-weight-normal">Register Here</h1>
<div class="row">
    <div class="col-md-6">
       <div class="form-input">
        <label for="inputEmail">Name</label>
        <input type="text" name="fname"  class="form-control" placeholder="Enter Here"/>
       </div>
    </div> 
    <div class="col-md-6">
      <div class="form-input">
        <label for="inputEmail">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Here"/>
       </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-6">
       <div class="form-input">
        <label for="inputEmail">Street</label>
        <input type="text" name="street" class="form-control" placeholder="Enter Here"/>
       </div>
    </div> 
    <div class="col-md-6">
      <div class="form-input">
        <label for="inputEmail">Phone Number</label>
        <input type="number" name="number" class="form-control" placeholder="Enter Here"/>
       </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-6">
       <div class="form-input text-left">
        <label for="inputEmail">Gender</label>
         <input type="radio" name="gender" value="Male"/> <span>Male</span>
         <input type="radio" name="gender" value="Female"/> <span>Female</span>
       </div>
    </div> 
    <div class="col-md-6">
      <div class="form-input">
        <label for="inputEmail">Country</label>
        <input type="text" name="country" class="form-control" placeholder="Enter Here"/>
       </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-6">
       <div class="form-input">
        <label for="inputEmail">Password</label>
         <input type="password" name="password" class="form-control conf-password" placeholder="Enter Here"/>
       </div>
    </div> 
    <div class="col-md-6">
       <div class="form-input">
        <label for="inputEmail">Confirm Password</label>
         <input type="password" name="confirm_password" class="form-control" placeholder="Enter Here"/>
       </div>
    </div> 
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
<p class="mt-5 mb-3 text-muted">Already have an account please login <a href="index.php"> here</a></p>
</form>



<script src="js/jquery.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
   jQuery(document).ready(function($)
   {
    $("#registerForm").validate({
        rules: {
            fname: {
                required: !0
            },
            email: {
                required: !0
            },
            password: {
                required: !0,
                minlength: 6
            },
            number: {
                required: !0,
                digits: !0,
                minlength: 10,
                maxlength: 10
            },
            confirm_password : {
                equalTo : ".conf-password"
            }
            
        },
        submitHandler: function(e) {
            $("#registerForm").submit();
        }
    })
   }); 
</script>
</body>
</html>
