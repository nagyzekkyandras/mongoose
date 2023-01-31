<?php
require_once 'vendor/autoload.php';
require_once 'libs/page.php';
require_once 'libs/check-session.php';

pageHeader();

try {
    $database = new Database();
    $conn = $database->getConnection();
    $result = $database->getUserData();

    if ($result['permission'] == 'admin') {
        pageNavbarAdmin();
    } else {
        pageNavbarUser();
    }

    if ($result) {
        echo "<p>Email: " . $result['email'] . "</p>";
        echo "<p>Name: " . $result['name'] . "</p>";
        echo "<p>Permission: " . $result['permission'] . "</p>";
        echo "<p>Auth type: " . $result['auth_type'] . "</p>";
        echo "<p>Create Date: " . $result['create_date'] . "</p>";
    }
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["password1"]) || empty($_POST["password2"])) {
            echo '<div class="alert alert-danger text-center" role="alert">Password is empty!</div>';
        }
        if (!empty($_POST["password1"]) || !empty($_POST["password2"])) {
            if ($_POST["password1"] != $_POST["password2"]) {
                echo '<div class="alert alert-danger text-center" role="alert">Passwords not the same!</div>';
            } else {
                $database = new Database();
                $conn = $database->getConnection();
                $result = $database->updatePassword();
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
