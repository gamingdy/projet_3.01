<?php
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../controller/suppression.php';

$request = $_SERVER["REQUEST_METHOD"];

if ($request == "GET") {
    if (!isset($_SERVER["HTTP_REFERER"])) {
        header('Location: index.php');
    }
    $id = $_GET['id'];
    $type = $_GET['type'];
    if ($type == "medecin") {
        suppresionMedecin($id);
        header('Location: medecins.php');
    } elseif ($type == "usager") {
        suppresionUsager($id);
        header('Location: usagers.php');
    } elseif ($type == "rdv") {
        suppresionRdv($id);
        header('Location: consultations.php');
    }
} else {
    header('Location: index.php');
}
