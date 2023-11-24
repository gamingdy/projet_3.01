<?php
    class RendezVous{
        private Usager $_usager;
        private Medecin $_medecin;
        private datetime $_dateHeureRDV;
        private int $_dureeMinutes = 30;
    }

    public function __construct($_usager, $_medecin) {
        $this->$_dateHeureRDV = $_dateHeureRDV;
        $this->$_dureeMinutes = $_dureeMinutes;
    }

    public function getDateHeureRDV(): datetime {
        return $this->_dateHeureRDV;
    }

    public function getDureeMinutes(): int {
        return $this->_dureeMinutes;
    }

    public function getUsager(): Usager {
        return $this->_usager;
    }

    public function getMedecin(): int {
        return $this->_medecin;
    }

?>
