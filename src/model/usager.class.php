<?php
include 'individu.class.php';
class Usager extends Individu {
    private Individu $_individu;
    private string $_adresse;
    private datetime $_dateNaissance;
    private string $_lieuNaissance;
    private int $_securiteSociale;
    private Medecin $_medecinReferent;

    public function __construct($_nom,$_prenom,$_civilite,$_adresse,$_dateNaissance,$_lieuNaissance,$_securiteSociale){
        parent::__construct($_nom,$_prenom,$_civilite);
        $this->$_adresse = $_adresse;
        $this->$_dateNaissance = $_dateNaissance;
        $this->$_lieuNaissance = $_lieuNaissance;
        $this->$_securiteSociale = $_securiteSociale;
    }
    
    public function getAdresse(): string {
        return $this->_adresse;
    }
    
    public function getDateNaissance(): datetime {
        return $this->_dateNaissance;
    }
    
    public function getLieuNaissance(): string {
        return $this->_lieuNaissance;
    }
    
    public function getSecuriteSociale(): int {
        return $this->_securiteSociale;
    }

}

