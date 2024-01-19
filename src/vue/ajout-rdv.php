<?php
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../model/custom-template.class.php';

require_once __DIR__ . '/../dao/dao-rendezvous.class.php';
require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../dao/dao-medecin.class.php';

require_once __DIR__ . '/../model/rendezvous.class.php';

$template = new CustomTemplate('ajout-rdvs.tpl');
$request = $_SERVER["REQUEST_METHOD"];
$daoUsager = new DaoUsager();
$daoMedecin = new DaoMedecin();

if ($request == "GET") {
    $usagers = $daoUsager->getAllUsager();
    $medecins = $daoMedecin->getAllMedecin();
    $template->assign('usagers', $usagers);
    $template->assign('medecins', $medecins);

    $template->show();
} elseif ($request == "POST") {
    $usager = $daoUsager->getUsagerById($_POST['usager']);
    $medecin = $daoMedecin->getMedecinById($_POST['medecin']);
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $duree = $_POST['duree'];
    $rdv = new RendezVous($usager, $medecin, $date, $heure, $duree);
    $daoRdv = new DaoRendezVous();
    $daoRdv->addRendezVous($rdv);
    header('Location: consultations.php');
}
