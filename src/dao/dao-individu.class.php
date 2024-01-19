<?php
require_once __DIR__ . '/connexion.php';

require_once __DIR__ . '/../model/individu.class.php';
require_once __DIR__ . '/../model/civilite.class.php';


class DaoIndividu{

    private PDO $_pdo;

    public function __construct () {
        $this->_pdo = Connexion::getInstance()->getPDO();
    }

    public function getIndividu (int $_id): Individu | null {
        $sql = "SELECT * FROM individu WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $civilite = Civilite::fromString($row['civilite']);
            $individu = new Individu($row['nom'], $row['prenom'], $civilite);
            $individu->setId($row['id']);
            return $individu;
        }
        return null;
    }

    public function addIndividu (Individu $_individu): int {
        $sql = "INSERT INTO individu (nom,prenom,civilite) VALUES (:nom,:prenom,:civilite)";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':nom', $_individu->getNom());
        $stmt->bindValue(':prenom', $_individu->getPrenom());
        $stmt->bindValue(':civilite', $_individu->getCivilite()->value);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function updateIndividu (Individu $_individu): void {
        $sql = "UPDATE individu SET nom = :nom, prenom = :prenom WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':nom', $_individu->getNom());
        $stmt->bindValue(':prenom', $_individu->getPrenom());
        $stmt->bindValue(':id', $_individu->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteIndividu (int $_id): void {
        $sql = "DELETE FROM individu WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}