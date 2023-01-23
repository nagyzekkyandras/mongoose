<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/db-connect.php';
require_once 'libs/time.php';
page_header();
 
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

if (isset($_SESSION['email'])) {
    header('location:index.php');
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
      // get email
      $query = $conn->createQueryBuilder()
                    ->select('COUNT(id) as count')
                    ->from('users')
                    ->where('email = :email')
                    ->setParameter('email', $_SESSION['email']);
      $rowcount = $query->execute()->fetch();

      $first_value = reset($rowcount); // First element's value

      if ($first_value == 1) { // if already member
        $conn->update('users', array('last_login' => moment()), array('email' => $_SESSION['email']));
        // UPDATE users (last_login) VALUES (?) WHERE id = ? (now(), $_SESSION['email'])
      } else { // if new member
        $conn->insert('users', array('name' => $_SESSION['name'],
                                     'email' => $_SESSION['email'],
                                     'auth_type' => 'Google',
                                     'permission' => 'user',
                                     'create_date' => moment(),
                                     'last_login' => moment()));
      }

      header('location:index.php');
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
    $query = $conn->createQueryBuilder()
                    ->select('COUNT(id) as count')
                    ->from('users')
                    ->where('password = :password')
                    ->andWhere('email = :email')
                    ->setParameter('email', $_POST['email'])
                    ->setParameter('password', $_POST['password']);
    $rowcount = $query->execute()->fetch();
  
    $first_value = reset($rowcount); // First element's value
  
    if ($first_value == 1) {
       $_SESSION['email'] = $_POST['email'];
       $conn->update('users', array('last_login' => moment()), array('email' => $_SESSION['email']));
       // UPDATE users (last_login) VALUES (?) WHERE id = ? (now(), $_SESSION['email'])
       header("location: index.php");
    } else {
      echo '<div class="alert alert-danger text-center" role="alert">Wrong credentials!</div>';
    }
  }
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
  header("location: error.html");
}

page_footer();
