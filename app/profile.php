<?php
require_once 'vendor/autoload.php';

$session = new Session();
$database = new Database();
$smarty = new Smarty();

$conn = $database->getConnection();
$session -> checkSession();

$smarty->setTemplateDir('./templates');
$smarty->setConfigDir('./configs');
$smarty->setCompileDir('./compile');
$smarty->setCacheDir('./cache');

$smarty->assign('isProfilePage', true);
$smarty->assign('isAdminPage', false);

try {
    $result = $database->getUserData();
    if ($result['permission'] == 'admin') {
        $smarty->assign('isAdmin', true);
    } else {
        $smarty->assign('isAdmin', false);
    }

    if ($result) {
        $smarty->assign('name', $result['name']);
        $smarty->assign('email', $result['email']);
        $smarty->assign('permission', $result['permission']);
        $smarty->assign('auth_type', $result['auth_type']);
        $smarty->assign('create_date', $result['create_date']);
    }
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

// password change
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["password1"]) || empty($_POST["password2"])) {
            echo '<div class="alert alert-danger text-center" role="alert">Password is empty!</div>';
        }
        if (!empty($_POST["password1"]) || !empty($_POST["password2"])) {
            if ($_POST["password1"] != $_POST["password2"]) {
                echo '<div class="alert alert-danger text-center" role="alert">Passwords not the same!</div>';
            } else {
                $conn = $database->getConnection();
                $result = $database->updatePassword();
                echo '<div class="alert alert-success text-center" role="alert">Pasword changed!</div>';
            }
        }
    }
} catch (Exception $e) {
    echo $error, $e->getMessage(), "\n";
}

$smarty->display('index.tpl');
