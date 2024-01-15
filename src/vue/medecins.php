<?php
//we want to display this author list

require __DIR__ . '/../../vendor/autoload.php';
require_once 'HTML/Template/PHPLIB.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../model/civilite.class.php';

$daoMedecin = new DaoMedecin();
$medecins = $daoMedecin->getMedecins();

//create template object
$t = new HTML_Template_PHPLIB(__DIR__ . '/../template', 'keep');
//load file
$t->setFile('individu', 'list-usager.tpl');
//set block
$t->setBlock('individu', 'individu_card', 'individu_ref');

//set some variables
$t->setVar('PAGE_TITLE', 'Code authors as of ' . date('Y-m-d'));

//display the authors
foreach ($medecins as $medecin) {
    if ($medecin->getCivilite() == Civilite::M) {
        $t->setVar('INDIVIDU_SEXE', 'homme');
    } else {
        $t->setVar('INDIVIDU_SEXE', 'femme');
    }
    $t->setVar('INDIVIDU_NAME', $medecin->getNom());
    $t->setVar('INDIVIDU_PRENOM', $medecin->getPrenom());
    $t->parse('individu_ref', 'individu_card', true);
}

//finish and echo
echo $t->finish($t->parse('OUT', 'individu'));
