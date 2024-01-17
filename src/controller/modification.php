<?php

require_once __DIR__ . '/../model/usager.class.php';


function validateName (string $name): bool {
    return preg_match("/[^A-Za-zÀ-Üà-ü\-\s]/", $name);
}

function validateAdresse (string $adresse): bool {
    return preg_match("/[^A-Za-zÀ-Üà-ü\-\.\,\s0-9]/", $adresse);
}

function validateNombre (string $number): bool {
    return preg_match("/[0-9]/", $number);
}

function checkUsager (Usager $usager): ?string {
    if (validateName($usager->getNom())) {
        return "Nom invalide";
    }
    if (validateName($usager->getPrenom())) {
        return "Prénom invalide";
    }
    if (validateAdresse($usager->getAdresse())) {
        return "Adresse invalide";
    }
    return null;
}