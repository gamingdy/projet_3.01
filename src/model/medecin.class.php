<?php

require_once 'individu.class.php';

class Medecin extends Individu{
    private int $_id;


    public function __construct ($nom, $prenom, $civilite) {
        parent::__construct($nom, $prenom, $civilite);
    }

    public function setId (int $_id): void {
        $this->_id = $_id;
    }

    public function getId (): int {
        return $this->_id;
    }

}

?>
