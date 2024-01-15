<?php
//we want to display this author list

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoUsager = new DaoUsager();
$usager = $daoUsager->getUsagers();


//create template object
$template = new Smarty();
$template->setTemplateDir(__DIR__ . '/../template/');
//load file
$template->assign('titre', 'Liste des usagers');
$template->assign('individus', $usager);
$template->assign('is_usager', true);

//finish and echo
//$t->display(__DIR__ . '/../template/list-individu.tpl');
$template->display('list-individu.tpl');