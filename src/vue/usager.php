<?php
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/usager.class.php';
require_once __DIR__ . '/../controller/modification.php';
require_once __DIR__ . '/../model/custom-template.class.php';

$daoUsager = new DaoUsager();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {


    $daoUsager = new DaoUsager();
    $usager = $daoUsager->getUsagerById($_GET['id']);
    if ($usager == null) {
        header('Location: index.php');
        exit();
    }

    $template = new CustomTemplate('individu.tpl');
    $template->assign('titre', $usager->getPrenom() . ' ' . $usager->getNom());
    $template->assign('individu', $usager);
    $template->assign('type', "Usager");
    $template->assign('is_usager', true);
    $template->assign('erreur', '');
    $template->show();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $address = $_POST['adresse'];
    $id_usager = $_GET['id'];
    $usager = $daoUsager->getUsagerById($id_usager);
    $editedUsager = clone $usager;
    $editedUsager->setPrenom($prenom);
    $editedUsager->setNom($nom);
    $editedUsager->setAdresse($address);
    $error = checkUsager($editedUsager);
    if ($error != null) {
        $template = new CustomTemplate('individu.tpl');
        $template->assign('titre', $usager->getPrenom() . ' ' . $usager->getNom());
        $template->assign('individu', $usager);
        $template->assign('type', "Usager");
        $template->assign('is_usager', true);
        $template->assign('erreur', $error);
        $template->show();
    } else {
        $daoUsager->updateUsager($editedUsager);
        header('Location: usagers.php');
    }

} else {
    header('Location: index.php');
    exit();
}