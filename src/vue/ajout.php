<?php
//we want to display this author list

require_once __DIR__ . '/../model/custom-template.class.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';


//create template object
$template = new CustomTemplate('ajout.tpl');
//load file
$template->assign('titre', "Ajout à la base de données");
$template->assign('individus', "Usager");
$template->assign('type', "Usager");
$template->assign('erreur', '');
$template->assign('is_usager', true);

//finish and echo
//$t->display(__DIR__ . '/../template/ajout-usager.tpl');
$template->show();