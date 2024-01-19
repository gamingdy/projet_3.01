<?php

require_once __DIR__ . '/connexion.php';

require_once __DIR__ . '/../model/login.class.php';

class DaoLogin{
    private PDO $_pdo;

    public function __construct () {
        $this->_pdo = Connexion::getInstance()->getPDO();
    }

    public function checkLogin ($username, $password): bool {
        $sql = "SELECT * FROM login WHERE username = :username AND password = :password";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return true;
        }
        return false;
    }
}