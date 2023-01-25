<?php
require_once 'vendor/autoload.php';
require_once 'libs/check-session.php';
require_once 'libs/db-connect.php';
require_once 'libs/page.php';
pageHeader();

try {
    $querry = 'SELECT email,name,permission FROM users WHERE email = ?';
    $statement = $conn->executeQuery($querry, array($_SESSION['email']));
    $user = $statement->fetch();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("location: error.html");
}

if ($user['permission'] == 'admin') {
    pageNavbarAdmin();
} else {
    pageNavbarUser();
}

echo '<p id="email">Email: ' . $user['email'] . '</p>';
echo '<p>Name: ' . $user['name'] . '</p>';
echo '<p>Permission: ' . $user['permission'] . '</p>';

try {
    $query = 'SELECT password FROM users WHERE email = ?';
    $statement = $conn->executeQuery($querry, array($_SESSION['email']));
    $pw = $statement->fetch();

    if ($pw['password'] == null) {
        echo '<h3>Update your password!</h3>';
        echo '<form method="POST">
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password1" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword2" class="form-label">Password again</label>
          <input type="password" name="password2" class="form-control" id="exampleInputPassword2">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>';
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
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
                $query = 'UPDATE users SET password = ? WHERE email = ?';
                $count = $conn->executeUpdate($query, array($_POST["password1"], $_SESSION['email']));
                header('location:profile.php');
            }
        }
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

pageFooter();
