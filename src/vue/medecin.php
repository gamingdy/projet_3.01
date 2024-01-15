<?php
if (isset($_GET['id'])) {
    require_once __DIR__ . '/../dao/dao-usager.class.php';
    require_once __DIR__ . '/../model/usager.class.php';

    $daoUsager = new DaoUsager();
    $usager = $daoUsager->getUsager($_GET['id']);
    if ($usager == null) {
        header('Location: index.php');
        exit();
    }

    $template = new Smarty();
    $template->setTemplateDir(__DIR__ . '/../template/');
    $template->assign('titre', $usager->getPrenom() . ' ' . $usager->getNom());
    $template->assign('individu', $usager);
    $template->assign('is_usager', false);
    $template->display('individu.tpl');
} else {
    echo "non";
}