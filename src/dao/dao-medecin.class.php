<?php

require_once 'connexion.php';

require_once 'dao-individu.class.php';

require_once __DIR__ . '/../model/medecin.class.php';
require_once __DIR__ . '/../model/individu.class.php';

class DaoMedecin{

    private PDO $_pdo;
    private DaoIndividu $dao_individu;

    public function __construct () {
        $this->_pdo = Connexion::getInstance()->getPDO();
        $this->dao_individu = new DaoIndividu();
    }

    public function getMedecinById (int $_id): Medecin | null {
        $sql = "SELECT * FROM medecin WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $this->createMedecin($row);
        }
        return null;
    }

    private function createMedecin ($row): Medecin {
        $individu = $this->dao_individu->getIndividu($row['id_individu']);
        $nom = $individu->getNom();
        $prenom = $individu->getPrenom();
        $civilite = $individu->getCivilite();
        $medecin = new Medecin($nom, $prenom, $civilite);
        $medecin->setIdMedecin($row['id']);
        $medecin->setId($row['id_individu']);
        return $medecin;
    }

    public function getAllMedecin (): array {
        $sql = "SELECT * FROM medecin";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $medecins = [];
        foreach ($rows as $row) {
            $medecin = $this->createMedecin($row);
            $medecins[] = $medecin;
        }
        return $medecins;
    }

    public function addMedecin (Medecin $_medecin): int {
        $individu = new Individu($_medecin->getNom(), $_medecin->getPrenom(), $_medecin->getCivilite());
        $individu_id = $this->dao_individu->addIndividu($individu);

        $sql = "INSERT INTO medecin (id_individu) VALUES (:id_individu)";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id_individu', $individu_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function updateMedecin (Medecin $_medecin): void {
        $individu = new Individu($_medecin->getNom(), $_medecin->getPrenom(), $_medecin->getCivilite());
        $individu->setId($_medecin->getId());
        $this->dao_individu->updateIndividu($individu);
    }

    public function deleteMedecin (Medecin $medecin): void {
        $sql = "DELETE FROM medecin WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $medecin->getIdMedecin(), PDO::PARAM_INT);
        $stmt->execute();
        $this->dao_individu->deleteIndividu($medecin->getId());
    }
}