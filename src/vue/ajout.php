<?php
//we want to display this author list

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';


//create template object
$template = new Smarty();
$template->setTemplateDir(__DIR__ . '/../template/');
//load file
$template->assign('titre', "Ajout à la base de données");
$template->assign('individus', "Usager");
$template->assign('is_usager', true);

//finish and echo
//$t->display(__DIR__ . '/../template/ajout-usager.tpl');
$template->display('ajout.tpl');