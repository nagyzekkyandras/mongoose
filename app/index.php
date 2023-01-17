<?php
require_once 'vendor/autoload.php';
 
// init configuration 
$clientID = getenv('GC_CLIENT_ID');
$clientSecret = getenv('GC_CLIENT_SECRET');
$redirectUri = getenv('GC_CLIENT_URI');

// create Client Request to access Google API 
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

session_start();

if(isset($_SESSION['email'])) {
    header('location:app.php');
} else {
  // authenticate code from Google OAuth Flow 
  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    
    // get profile info 
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;

    header('location:app.php');
    // now you can use this profile info to create account in your website and make user logged in. 
  } else {
    echo "<p>Select authentication type:</p>";
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  }
}

?>