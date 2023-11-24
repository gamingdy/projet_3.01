<?php
    class Medecin{
        private int $_id;
    }

    public function __construct($_id){
        $this->$_id = $_id;
    }

    public function getMedecin(): Usager {
        return $this->_medecin;
    }
?>
