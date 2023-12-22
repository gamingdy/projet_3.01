<?php
require_once 'connexion.php';

require_once 'dao-individu.class.php';
require_once 'dao-medecin.class.php';

require_once __DIR__ . '/../model/usager.class.php';
require_once __DIR__ . '/../model/individu.class.php';

class DaoUsager{

    private PDO $_pdo;
    private DaoIndividu $dao_individu;
    private DaoMedecin $dao_medecin;

    public function __construct () {
        $this->_pdo = Connexion::getInstance()->getPDO();
        $this->dao_individu = new DaoIndividu();
        $this->dao_medecin = new DaoMedecin();

    }

    public function getUsager (int $_id): Usager | null {
        $sql = "SELECT * FROM usager WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $this->createUsager($row);
        }
        return null;
    }

    private function createUsager ($row): Usager {
        $individu = $this->dao_individu->getIndividu($row['id_individu']);
        $nom = $individu->getNom();
        $prenom = $individu->getPrenom();
        $civilite = $individu->getCivilite();

        $id_medecin = $row['id_medecin'];

        $usager = new Usager($nom, $prenom, $civilite, $row['adresse'], $row['datenaissance'], $row['lieunaissance'], $row['securitesociale']);
        if ($id_medecin) {
            $medecin_ref = $this->dao_medecin->getMedecin($id_medecin);
            $usager->setMedecinReferent($medecin_ref);
        }
        $usager->setId($row['id']);
        return $usager;
    }

    public function getUsagers (): array {
        $sql = "SELECT * FROM usager";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usagers = [];
        foreach ($rows as $row) {
            $usager = $this->createUsager($row);
            $usagers[] = $usager;
        }
        return $usagers;
    }

    public function addUsager (Usager $_usager): void {
        $individu = new Individu($_usager->getNom(), $_usager->getPrenom(), $_usager->getCivilite());
        $individu_id = $this->dao_individu->addIndividu($individu);
        $medecin_ref = $_usager->getMedecinReferent();
        $medecin_ref_id = $medecin_ref?->getId();

        $sql = "INSERT INTO usager (adresse, datenaissance, lieunaissance, securitesociale,id_medecin, id_individu) VALUES (:adresse, :dateNaissance, :lieuNaissance, :securiteSociale,:id_medecin, :id_individu)";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':adresse', $_usager->getAdresse());
        $stmt->bindValue(':dateNaissance', $_usager->getDateNaissance());
        $stmt->bindValue(':lieuNaissance', $_usager->getLieuNaissance());
        $stmt->bindValue(':securiteSociale', $_usager->getSecuriteSociale());
        $stmt->bindValue(':id_medecin', $medecin_ref_id);
        $stmt->bindValue(':id_individu', $individu_id);
    }

}