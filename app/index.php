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

$smarty->assign('isProfilePage', false);
$smarty->assign('isAdminPage', false);

try {
    $result = $database->getUserData();
    if ($result['permission'] == 'admin') {
        $smarty->assign('isAdmin', true);
    } else {
        $smarty->assign('isAdmin', false);
    }
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

$smarty->display('index.tpl');
