<?php
//we want to display this author list
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../model/custom-template.class.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoMedecin = new DaoMedecin();
$medecins = $daoMedecin->getAllMedecin();


//create template object
$template = new CustomTemplate('list-individu.tpl');
//load file
$template->assign('titre', 'Liste des médecins');
$template->assign('individus', $medecins);
$template->assign('type', "médecins");
$template->assign('is_usager', false);

//finish and echo
//$t->display(__DIR__ . '/../template/list-individu.tpl');
$template->show();
