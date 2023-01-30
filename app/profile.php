<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
include 'libs/db-connect.php';

pageHeader();

$error = "Caught exception: ";

try {
    $query = 'SELECT email,name,permission FROM users WHERE email = ?';
    $statement = $conn->executeQuery($query, array($_SESSION['email']));
    $user = $statement->fetch();
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

if ($user['permission'] == 'admin') {
    pageNavbarAdmin();
} else {
    pageNavbarUser();
}

echo '<h3>Your profile:</h3>';
$profile = new Profile($user['name'], $user['email'], $user['permission']);
echo $profile -> getProfileInfo();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["password1"]) || empty($_POST["password2"])) {
            echo '<div class="alert alert-danger text-center" role="alert">Password is empty!</div>';
        }
        if (!empty($_POST["password1"]) || !empty($_POST["password2"])) {
            if ($_POST["password1"] != $_POST["password2"]) {
                echo '<div class="alert alert-danger text-center" role="alert">Passwords not the same!</div>';
            } else {
                $query = 'UPDATE users SET password = ? WHERE email = ?';
                $count = $conn->executeUpdate($query, array($_POST["password1"], $_SESSION['email']));
                echo '<div class="alert alert-success text-center" role="alert">Pasword changed!</div>';
            }
        }
    }
} catch (Exception $e) {
    echo $error, $e->getMessage(), "\n";
}

echo '<h3>Password change:</h3>';
echo '<form method="POST">
<div class="mb-3">
  <label for="inputPassword1" class="form-label">Password</label>
  <input type="password" name="password1" class="form-control" id="inputPassword1">
</div>
<div class="mb-3">
  <label for="inputPassword2" class="form-label">Password again</label>
  <input type="password" name="password2" class="form-control" id="inputPassword2">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>';

pageFooter();
