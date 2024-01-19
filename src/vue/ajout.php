<?php
//we want to display this author list
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../model/custom-template.class.php';

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../dao/dao-medecin.class.php';

require_once __DIR__ . '/../model/civilite.class.php';
require_once __DIR__ . '/../model/usager.class.php';
require_once __DIR__ . '/../model/medecin.class.php';

require_once __DIR__ . '/../controller/modification.php';


$template = new CustomTemplate('ajout-individu.tpl');
//load file
$template->assign('titre', "Ajout à la base de données");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['type'])) {
    $template->assign('type', $_GET['type']);
    $template->assign('erreur', '');
    if ($_GET['type'] == "médecins") {
        $template->assign('is_usager', false);
    } else {
        $daoMedecin = new DaoMedecin();
        $medecins = $daoMedecin->getAllMedecin();
        $template->assign('is_usager', true);
        $template->assign('medecins', $medecins);
    }
    $template->show();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['type'])) {
    $type = $_GET['type'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $sexe = $_POST['gender'];
    $civilite = Civilite::fromString($sexe);
    if ($type == "médecins") {
        $medecin = new Medecin($nom, $prenom, $civilite);
        $error = checkMedecin($medecin);
        if ($error != null) {
            $template->assign('type', $type);
            $template->assign('erreur', $error);
            $template->assign('is_usager', false);
            $template->show();
        } else {
            $daoMedecin = new DaoMedecin();
            $daoMedecin->addMedecin($medecin);
            header('Location: medecins.php');
        }
    } elseif ($type == "usagers") {
        $adresse = $_POST['adresse'];
        $date_naissance = $_POST['anniv'];
        $secu = $_POST['secu'];
        $medecin_traitant = $_POST['referent'];
        $usager = new Usager($nom, $prenom, $civilite, $adresse, $date_naissance, $secu);
        if ($medecin_traitant != "-1") {
            $daoMedecin = new DaoMedecin();
            $medecin = $daoMedecin->getMedecinById($medecin_traitant);
            $usager->setMedecinReferent($medecin);
        }
        $error = checkUsager($usager);
        if ($error != null) {
            $template->assign('type', $type);
            $template->assign('erreur', $error);
            $template->assign('is_usager', true);
            $template->show();
        } else {
            $new_date = dateToSql($date_naissance);
            $usager->setDateNaissance($new_date);
            $daoUsager = new DaoUsager();
            $daoUsager->addUsager($usager);
            header('Location: usagers.php');
        }
    }

} else {
    echo "no";
}

