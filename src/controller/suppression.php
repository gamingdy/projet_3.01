<?php

require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../dao/dao-medecin.class.php';
require_once __DIR__ . '/../dao/dao-rendezvous.class.php';


function suppresionUsager (int $id): void {
    $daoUsager = new DaoUsager();
    $daoRdv = new DaoRendezVous();
    $rdvs = $daoRdv->getRendezVousByUsagerId($id);
    foreach ($rdvs as $rdv) {
        $daoRdv->deleteRendezVous($rdv);
    }
    $usager = $daoUsager->getUsagerById($id);
    $daoUsager->deleteUsager($usager);
}

function suppresionMedecin (int $id): void {
    $daoMedecin = new DaoMedecin();
    $daoRdv = new DaoRendezVous();
    $rdvs = $daoRdv->getRendezVousByMedecinId($id);
    foreach ($rdvs as $rdv) {
        $daoRdv->deleteRendezVous($rdv);
    }
    $medecin = $daoMedecin->getMedecinById($id);
    $daoMedecin->deleteMedecin($medecin);
}

function suppresionRdv (int $id): void {
    $daoRdv = new DaoRendezVous();
    $rdv = $daoRdv->getRendezVousById($id);
    $daoRdv->deleteRendezVous($rdv);
}