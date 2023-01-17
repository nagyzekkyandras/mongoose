<?php

session_start();
if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    echo '<p>SESSION email is set and not empty!</p>';
    echo "<p>Your session is running with " . $_SESSION['name'] . "as " . $_SESSION['email'] . "</p>";
    echo "<br/><a href='logout.php'>Click here to log out</a>";
} else {
    header('location:index.php');
}

?>