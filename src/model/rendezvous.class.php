<?php

require_once __DIR__ . '/usager.class.php';
require_once __DIR__ . '/medecin.class.php';

class RendezVous{
    private int $id;
    private Usager $_usager;
    private Medecin $_medecin;
    private string $_dateHeureRDV;
    private int $_dureeMinutes = 30;


    public function __construct ($_usager, $_medecin, $_dateHeureRDV, $_dureeMinutes) {
        $this->_usager = $_usager;
        $this->_medecin = $_medecin;
        $this->_dateHeureRDV = $_dateHeureRDV;
        $this->_dureeMinutes = $_dureeMinutes;
    }

    public function getDateHeureRDV (): string {
        return $this->_dateHeureRDV;
    }

    public function getDureeMinutes (): int {
        return $this->_dureeMinutes;
    }

    public function getUsager (): Usager {
        return $this->_usager;
    }

    public function getMedecin (): Medecin {
        return $this->_medecin;
    }

    public function setId (int $id): void {
        $this->id = $id;
    }
}
