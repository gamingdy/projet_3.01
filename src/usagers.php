<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Usagers</title>
    <link rel="stylesheet" href="vue/style/list-usager.css">
</head>
<body>
<p>Voici la liste des usagers</p>

<ul>

    <?php
    require_once 'dao/dao-usager.class.php';
    require_once 'model/civilite.class.php';

    $daoUsager = new DaoUsager();
    $usagers = $daoUsager->getUsagers();
    foreach ($usagers as $usager) { ?>
        <div class="card">
            <?php

            if ($usager->getCivilite() == Civilite::M) {
                $img_sex = 'homme.png';
            } else {
                $img_sex = 'femme.png';
            }
            echo "<img class='sex_icon' src='vue/img/$img_sex' alt='test'>";
            ?>

            <p>Nom : <?php echo $usager->getNom(); ?></p>
            <p>Prenom : <?php echo $usager->getPrenom(); ?></p>
            <p>Adresse : <?php echo $usager->getAdresse(); ?></p>
            <p> Sécurité sociale : <?php echo $usager->getSecuriteSociale(); ?></p>
            <p> Date de naissance: <?php echo $usager->getDateNaissance() ?> </p>
        </div>

    <?php } ?>
</ul>
</body>
</html>