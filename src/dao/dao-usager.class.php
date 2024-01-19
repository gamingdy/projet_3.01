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

    public function getUsagerById (int $_id): Usager | null {
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

    public function getUsagerByMedecinId (int $id): array {
        $sql = "SELECT * FROM usager WHERE id_medecin = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usagers = [];
        foreach ($rows as $row) {
            $usager = $this->createUsager($row);
            $usagers[] = $usager;
        }
        return $usagers;
    }

    private function createUsager ($row): Usager {
        $individu = $this->dao_individu->getIndividu($row['id_individu']);
        $nom = $individu->getNom();
        $prenom = $individu->getPrenom();
        $civilite = $individu->getCivilite();

        $id_medecin = $row['id_medecin'];

        $usager = new Usager($nom, $prenom, $civilite, $row['adresse'], $row['datenaissance'], $row['securitesociale']);
        if ($id_medecin) {
            $medecin_ref = $this->dao_medecin->getMedecinById($id_medecin);
            $usager->setMedecinReferent($medecin_ref);
        }
        $usager->setIdUsager($row['id']);
        $usager->setId($row['id_individu']);
        return $usager;
    }

    public function getAllUsager (): array {
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

    public function addUsager (Usager $_usager): int {
        $individu = new Individu($_usager->getNom(), $_usager->getPrenom(), $_usager->getCivilite());
        $individu_id = $this->dao_individu->addIndividu($individu);
        $medecin_ref = $_usager->getMedecinReferent();
        $medecin_ref_id = $medecin_ref?->getId();

        $sql = "INSERT INTO usager (adresse, datenaissance, securitesociale,id_medecin, id_individu) VALUES (:adresse, :dateNaissance, :securiteSociale,:id_medecin, :id_individu)";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':adresse', $_usager->getAdresse());
        $stmt->bindValue(':dateNaissance', $_usager->getDateNaissance());
        $stmt->bindValue(':securiteSociale', $_usager->getSecuriteSociale());
        $stmt->bindValue(':id_medecin', $medecin_ref_id);
        $stmt->bindValue(':id_individu', $individu_id);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function updateUsager (Usager $_usager): void {
        $individu = new Individu($_usager->getNom(), $_usager->getPrenom(), $_usager->getCivilite());
        $individu->setId($_usager->getId());
        $this->dao_individu->updateIndividu($individu);
        $medecin_ref = $_usager->getMedecinReferent();
        $medecin_ref_id = $medecin_ref?->getId();

        $sql = "UPDATE usager SET adresse = :adresse,  id_medecin = :id_medecin WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':adresse', $_usager->getAdresse());
        $stmt->bindValue(':id_medecin', $medecin_ref_id);
        $stmt->bindValue(':id', $_usager->getIdUsager(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteUsager (Usager $usager): void {
        $sql = "DELETE FROM usager WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $usager->getIdUsager(), PDO::PARAM_INT);
        $stmt->execute();
        $this->dao_individu->deleteIndividu($usager->getId());
    }

}