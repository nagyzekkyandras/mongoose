<?php
require_once 'libs/check-session.php';
require_once 'libs/page.php';
page_header();
page_navbar();

echo '<p>Username: ' . $_SESSION['name'] . '</p>';
echo '<p>Email: ' . $_SESSION['email'] . '</p>';

page_footer();
?>