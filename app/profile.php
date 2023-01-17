<?php
require_once 'libs/header.php';
require_once 'libs/check-session.php';
require_once 'libs/navbar.php';

echo '<p>Username: ' . $_SESSION['name'] . '</p>';
echo '<p>Email: ' . $_SESSION['email'] . '</p>';

require_once 'libs/footer.php';
?>