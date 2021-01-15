<?php

require_once 'vendor/autoload.php';
 
// init configuration
$clientID = '773831977402-65rd59pi36gaere18mvq4pqklkmuausb.apps.googleusercontent.com';
$clientSecret = '0Sl96Wo0IGWi-kVHhqY-fnKO';
$redirectUri = 'http://localhost/loginApp/index.php';
  
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// session_start();

?>