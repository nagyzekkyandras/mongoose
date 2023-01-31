<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';

$session = new Session();
$database = new Database();

$conn = $database->getConnection();
//$session -> checkSession();

pageHeader();

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

if (isset($_SESSION['email'])) {
    header("location:index.php");
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

    try {
      // google login check
      $result = $database->checkUserEmail();
      if ($result["count"] == 1) { // if already member
        $database->updateLastLogin();
      } else { // if new member
        $database->createNewGoogleUser();
      }
      header("location:index.php");
      // now you can use this profile info to create account in your website and make user logged in.
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
        header("location: error.html");
    }

  } else {
    require_once 'libs/login.php';
  }
}

try {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $result = $database->checkUserExists();
    if ($result["count"] == 1) {
       $_SESSION['email'] = $_POST['email'];
       $database->updateLastLogin();
       header("location: index.php");
    } else {
      echo '<div class="alert alert-danger text-center" role="alert">Wrong credentials!</div>';
    }
  }
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
  header("location: error.html");
}

pageFooter();
