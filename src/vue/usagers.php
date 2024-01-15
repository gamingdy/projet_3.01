<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Usagers</title>
    <link rel="stylesheet" href="style/list-usager.css">
</head>
<body>
<p>Voici la liste des usagers</p>

<ul>

    <?php
    //we want to display this author list

    require __DIR__ . '/../../vendor/autoload.php';
    require_once 'HTML/Template/PHPLIB.php';

    require_once __DIR__ . '/../dao/dao-usager.class.php';
    require_once __DIR__ . '/../model/civilite.class.php';

    $daoUsager = new DaoUsager();
    $usagers = $daoUsager->getUsagers();

    //create template object
    $t = new HTML_Template_PHPLIB(__DIR__ . '/../template', 'keep');
    //load file
    $t->setFile('individu', 'list-individu.tpl');
    //set block
    $t->setBlock('individu', 'individu_card', 'individu_ref');

    //set some variables
    $t->setVar('PAGE_TITLE', 'Code authors as of ' . date('Y-m-d'));

    //display the authors
    foreach ($usagers as $usager) {
        if ($usager->getCivilite() == Civilite::M) {
            $t->setVar('INDIVIDU_SEXE', 'homme');
        } else {
            $t->setVar('INDIVIDU_SEXE', 'femme');
        }
        $t->setVar('INDIVIDU_NAME', $usager->getNom());
        $t->setVar('INDIVIDU_PRENOM', $usager->getPrenom());
        $t->setVar('INDIVIDU_ADRESSE', $usager->getAdresse());
        $t->setVar('INDIVIDU_SOCIALE', $usager->getSecuriteSociale());
        $t->setVar('DATE_NAISSANCE', $usager->getDateNaissance());
        $t->parse('individu_ref', 'individu_card', true);
    }

    //finish and echo
    echo $t->finish($t->parse('OUT', 'individu'));
    ?>
</ul>
</body>
</html>