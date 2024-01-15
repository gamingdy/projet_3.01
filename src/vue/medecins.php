<?php
//we want to display this author list

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoMedecin = new DaoMedecin();
$medecins = $daoMedecin->getMedecins();


//create template object
$t = new Smarty();
$t->setTemplateDir(__DIR__ . '/../template/');
//load file
$t->assign('titre', 'Liste des médecins');
$t->assign('individus', $medecins);
$t->assign('is_usager', false);

//finish and echo
//$t->display(__DIR__ . '/../template/list-individu.tpl');
$t->display('list-individu.tpl');