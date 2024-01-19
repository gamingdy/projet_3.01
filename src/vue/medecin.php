<?php
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../dao/dao-medecin.class.php';
require_once __DIR__ . '/../model/medecin.class.php';
require_once __DIR__ . '/../model/custom-template.class.php';
$daoMedecin = new DaoMedecin();

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {


    $medecin = $daoMedecin->getMedecinById($_GET['id']);
    if ($medecin == null) {
        header('Location: index.php');
        exit();
    }

    $template = new CustomTemplate('individu.tpl');
    $template->assign('titre', $medecin->getPrenom() . ' ' . $medecin->getNom());
    $template->assign('individu', $medecin);
    $template->assign('is_usager', false);
    $template->assign('type', "Medecin");
    $template->assign('erreur', '');
    $template->show();
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $id_medecin = $_GET['id'];
    $medecin = $daoMedecin->getMedecinById($id_medecin);
    $medecin->setPrenom($prenom);
    $medecin->setNom($nom);
    $daoMedecin->updateMedecin($medecin);
    header('Location: medecins.php');
} else {
    echo "non";
}