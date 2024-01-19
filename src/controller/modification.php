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
    return $d && $d->format('d/m/Y') === $date;
}


function checkUsager (Usager $usager): ?string {
    if (empty($usager->getNom()) || empty($usager->getPrenom()) || empty($usager->getAdresse())
        || empty($usager->getDateNaissance()) || empty($usager->getSecuriteSociale())) {
        return "Veuillez remplir tous les champs";
    }
    if (validateName($usager->getNom())) {
        return "Nom invalide";
    }
    if (validateName($usager->getPrenom())) {
        return "Prénom invalide";
    }
    if (validateAdresse($usager->getAdresse())) {
        return "Adresse invalide";
    }

    if (validateNombre($usager->getSecuriteSociale())) {
        return "Numéro de sécurité sociale invalide";
    }

    if (!validateDate($usager->getDateNaissance())) {
        return "Date de naissance invalide";
    }

    return null;
}

function checkMedecin (Medecin $medecin): ?string {
    if (empty($medecin->getNom()) || empty($medecin->getPrenom())) {
        return "Veuillez remplir tous les champs";
    }
    if (validateName($medecin->getNom())) {
        return "Format du nom invalide";
    }
    if (validateName($medecin->getPrenom())) {
        return "Format du prénom invalide";
    }
    return null;
}

function dateToSql ($date): string {
    $d = DateTime::createFromFormat('d/m/Y', $date);
    return $d->format('Y-m-d');
}