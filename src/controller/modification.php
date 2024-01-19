<?php

require_once __DIR__ . '/../model/usager.class.php';


function validateName (string $name): bool {
    return preg_match("/[^A-Za-zÀ-Üà-ü\-\s]/", $name);
}

function validateAdresse (string $adresse): bool {
    return preg_match("/[^A-Za-zÀ-Üà-ü\-.,\s0-9]/", $adresse);
}

function validateNombre (string $number): bool {
    return preg_match("/[^0-9]/", $number);
}

function validateDate ($date): bool {
    $d = DateTime::createFromFormat('d/m/Y', $date);
    if ($d) {
        return $d && $d->format('d/m/Y') === $date;
    }
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;

}


function checkUsager (Usager $usager): ?string {
    if (empty($usager->getNom()) || empty($usager->getPrenom()) || empty($usager->getAdresse())
        || empty($usager->getDateNaissance()) || empty($usager->getSecuriteSociale())) {
        return "Veuillez remplir tous les champs";
    }
    if (validateName($usager->getNom())) {
        return "Nom invalide, veuillez entrer que des lettres";
    }
    if (validateName($usager->getPrenom())) {
        return "Prénom invalide, veuillez entrer que des lettres";
    }
    if (validateAdresse($usager->getAdresse())) {
        return "Adresse invalide, veuillez entrer que des lettres et des nombres";
    }

    if (validateNombre($usager->getSecuriteSociale())) {
        return "Numéro de sécurité sociale invalide, veuillez entrer que des nombres";
    }

    if (!validateDate($usager->getDateNaissance())) {
        return "Date de naissance invalide, le bon format est jj/mm/aaaa";
    }
    return null;
}

function checkMedecin (Medecin $medecin): ?string {
    if (empty($medecin->getNom()) || empty($medecin->getPrenom())) {
        return "Veuillez remplir tous les champs";
    }
    if (validateName($medecin->getNom())) {
        return "Nom invalide, veuillez entrer que des lettres";
    }
    if (validateName($medecin->getPrenom())) {
        return "Prénom invalide, veuillez entrer que des lettres";
    }
    return null;
}

function dateToSql ($date): string {
    $d = DateTime::createFromFormat('d/m/Y', $date);
    return $d->format('Y-m-d');
}