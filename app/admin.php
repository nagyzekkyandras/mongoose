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
$smarty->assign('isAdminPage', true);

try {
    $result = $database->getUserData();
    if ($result['permission'] == 'admin') {
        $smarty->assign('isAdmin', true);
        $users = $database->adminListUsers();
        $smarty->assign('users', $users);
        $gitlabs = $database->adminListGitlabs();
        $smarty->assign('gitlabs', $gitlabs);
    } else {
        $smarty->assign('isAdmin', false);
        // if you have no permission redirect to the index page
        header("location: index.php");
    }
} catch (Exception $e) {
    echo $error,  $e->getMessage(), "\n";
    header("location: error.html");
}

$smarty->display('index.tpl');
