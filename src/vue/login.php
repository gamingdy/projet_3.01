<?php
require_once __DIR__ . '/../model/custom-template.class.php';

require_once __DIR__ . '/../dao/dao-login.class.php';
require_once __DIR__ . '/../model/login.class.php';

session_start(); // Démarre la session
$template = new CustomTemplate('login.tpl');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $daoLogin = new DaoLogin();
    if ($daoLogin->checkLogin($username, $password)) {
        $_SESSION['user_id'] = 1;
        header('Location: index.php');
        exit();
    } else {
        $template->assign('erreur', 'Identifiants incorrects');
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $template->assign('erreur', '');
}
$template->show();

