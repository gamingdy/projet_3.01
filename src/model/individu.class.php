<?php
class Individu{    // Classe de composition pour les classes Usager et Medecin (suite à une récommandation de M. Gaëtan PIQUE)
    private Civilite $_civilite;
    private string $_nom;
    private string $_prenom;
    private int $_id;

    public function __construct($_nom,$_prenom,$_civilite){
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_civilite = $_civilite;
    }

    public function getCivilite(): Civilite {
        return $this->_civilite;
    }

    public function getNom(): string {
        return $this->_nom;
    }

    public function getPrenom(): string {
        return $this->_prenom;
    }

    public function getId(): int {
        return $this->_id;
    }
}
