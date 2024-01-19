<?php
require_once __DIR__ . '/../controller/login.php';
//we want to display this author list

require_once __DIR__ . '/../model/custom-template.class.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoUsager = new DaoUsager();
$usager = $daoUsager->getAllUsager();


$template = new CustomTemplate('list-individu.tpl');

$template->assign('titre', 'Liste des usagers');
$template->assign('individus', $usager);
$template->assign('type', "usagers");
$template->assign('is_usager', true);

$template->show();
