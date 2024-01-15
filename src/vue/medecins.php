<?php
//we want to display this author list

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoMedecin = new DaoMedecin();
$medecins = $daoMedecin->getMedecins();


//create template object
$template = new Smarty();
$template->setTemplateDir(__DIR__ . '/../template/');
//load file
$template->assign('titre', 'Liste des médecins');
$template->assign('individus', $medecins);
$template->assign('is_usager', false);

//finish and echo
//$t->display(__DIR__ . '/../template/list-individu.tpl');
$template->display('list-individu.tpl');