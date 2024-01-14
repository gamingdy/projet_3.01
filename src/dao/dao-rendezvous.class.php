<?php
require_once __DIR__ . '/connexion.php';

require_once 'dao-usager.class.php';
require_once 'dao-medecin.class.php';

require_once __DIR__ . '/../model/rendezvous.class.php';
require_once __DIR__ . '/../model/usager.class.php';

class DaoRendezVous{
    private PDO $_pdo;
    private DaoUsager $_daoUsager;
    private DaoMedecin $_daoMedecin;

    public function __construct () {
        $this->_pdo = Connexion::getInstance()->getPDO();
        $this->_daoUsager = new DaoUsager();
        $this->_daoMedecin = new DaoMedecin();
    }

    public function getRendezVous (int $_id): RendezVous | null {
        $sql = "SELECT * FROM rendezvous WHERE id = :id";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $rendezvous = $this->createRdv($row);
            $rendezvous->setId($row['id']);
            return $rendezvous;
        }
        return null;
    }

    public function getAllRendezVous (): array {
        $sql = "SELECT * FROM rendezvous";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rendezvous = [];
        foreach ($rows as $row) {
            $rendezvous[] = $this->createRdv($row);
        }
        return $rendezvous;

    }

    public function getRendezVousByUsager (int $_id): array {
        $sql = "SELECT * FROM rendezvous WHERE id_usager = :id";
        return $this->rendezVousMedecinUsager($sql, $_id);
    }

    public function getRendezVousByMedecin (int $_id): array {
        $sql = "SELECT * FROM rendezvous WHERE id_medecin = :id";
        return $this->rendezVousMedecinUsager($sql, $_id);
    }

    private function createRdv ($row): RendezVous {
        $usager = $this->_daoUsager->getUsager($row['id_usager']);
        $medecin = $this->_daoMedecin->getMedecin($row['id_medecin']);
        $dateHeureRDV = $row['dateheurerdv'];
        $dureeMinutes = $row['dureeminutes'];
        return new RendezVous($usager, $medecin, $dateHeureRDV, $dureeMinutes);
    }

    public function addRendezVous (RendezVous $_rendezvous): int {
        $sql = "INSERT INTO rendezvous (date,heure,id_individu) VALUES (:date,:heure,:id_individu)";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':date', $_rendezvous->getDate());
        $stmt->bindValue(':heure', $_rendezvous->getHeure());
        $stmt->bindValue(':id_individu', $_rendezvous->getIdIndividu());
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    private function rendezVousMedecinUsager (string $sql, int $_id): array {
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $_id, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rendezvous = [];
        foreach ($rows as $row) {
            $rendezvous[] = $this->createRdv($row);
        }
        return $rendezvous;
    }
}