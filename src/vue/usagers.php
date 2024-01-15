<?php
//we want to display this author list

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoUsager = new DaoUsager();
$usager = $daoUsager->getUsagers();


//create template object
$t = new Smarty();
$t->setTemplateDir(__DIR__ . '/../template/');
//load file
$t->assign('titre', 'Liste des usagers');
$t->assign('individus', $usager);
$t->assign('is_usager', true);

//finish and echo
//$t->display(__DIR__ . '/../template/list-individu.tpl');
$t->display('list-individu.tpl');