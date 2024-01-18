<?php

require_once __DIR__ . '/../dao/dao-rendezvous.class.php';
require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../dao/dao-medecin.class.php';
require_once __DIR__ . '/../model/custom-template.class.php';

function getStat (array $sexe, Usager $usager) {
    $current_date = new DateTime();
    $date_naissance = DateTime::createFromFormat('Y-m-d', $usager->getDateNaissance());
    $diff = $current_date->diff($date_naissance);
    if ($diff->y < 25) {
        $sexe[0]++;
    } else if ($diff->y < 50) {
        $sexe[1]++;
    } else {
        $sexe[2]++;
    }
    return $sexe;
}

$daoRendezVous = new DaoRendezVous();
$daoUsager = new DaoUsager();

$usagers = $daoUsager->getAllUsager();
$medecins = $daoRendezVous->getRDVTotalDureeByMedecinBeforeToday();

$femme_stat = [0, 0, 0];
$homme_stat = [0, 0, 0];

foreach ($usagers as $usager) {
    if ($usager->getCivilite()->toString() == "Mme") {
        $femme_stat = getStat($femme_stat, $usager);
    } else {
        $homme_stat = getStat($homme_stat, $usager);
    }
}


$template = new CustomTemplate('stats.tpl');
$template->assign('titre', 'Statistiques');
$template->assign('femme_stat', $femme_stat);
$template->assign('homme_stat', $homme_stat);
$template->assign('medecins', $medecins);

$template->show();