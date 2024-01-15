<?php

require_once __DIR__ . '/usager.class.php';
require_once __DIR__ . '/medecin.class.php';

class RendezVous{
    private int $id;
    private Usager $_usager;
    private Medecin $_medecin;
    private string $_dateRDV;
    private string $_heureRDV;
    private int $_dureeMinutes;


    public function __construct ($_usager, $_medecin, $_dateRDV, $_heureRDV, $_dureeMinutes) {
        $this->_usager = $_usager;
        $this->_medecin = $_medecin;
        $this->_dateRDV = $_dateRDV;
        $this->_heureRDV = $_heureRDV;
        $this->_dureeMinutes = $_dureeMinutes;
    }

    public function getDateRDV (): string {
        return $this->_dateRDV;
    }

    public function getHeureRDV (): string {
        return $this->_heureRDV;
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
