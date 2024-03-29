<?php
require_once 'individu.class.php';

class Usager extends Individu{
    private int $id_usager;
    private string $_adresse;
    private string $_dateNaissance;
    private string $_securiteSociale;
    private Medecin | null $_medecinReferent;

    public function __construct ($_nom, $_prenom, $_civilite, $_adresse, $_dateNaissance, $_securiteSociale) {
        parent::__construct($_nom, $_prenom, $_civilite);
        $this->_adresse = $_adresse;
        $this->_dateNaissance = $_dateNaissance;
        $this->_securiteSociale = $_securiteSociale;
        $this->_medecinReferent = null;
    }

    public function getAdresse (): string {
        return $this->_adresse;
    }

    public function setAdresse (string $_adresse): void {
        $this->_adresse = $_adresse;
    }

    public function getDateNaissance (): string {
        return $this->_dateNaissance;
    }

    public function setDateNaissance (string $_dateNaissance): void {
        $this->_dateNaissance = $_dateNaissance;
    }


    public function getSecuriteSociale (): string {
        return $this->_securiteSociale;
    }

    public function getMedecinReferent (): Medecin | null {
        return $this->_medecinReferent;
    }

    public function setMedecinReferent (?Medecin $_medecinReferent): void {
        $this->_medecinReferent = $_medecinReferent;
    }


    public function setIdUsager (int $id): void {
        $this->id_usager = $id;
    }

    public function getIdUsager (): int {
        return $this->id_usager;
    }
}

