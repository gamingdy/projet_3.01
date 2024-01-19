<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>{$titre}</title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
</head>
<body>
{include "header.html"}
<h1>Bienvenue</h1>
<div class="main">
    <a href="medecins.php">
        <div class="item">
            <img class='icon' src='/img/icons/medecin.png' alt='icone_personne'>
            <p>Medecins</p>
        </div>
    </a>
    <a href="usagers.php">
        <div class="item">
            <img class='icon' src='/img/M.png' alt='icone_personne'>
            <p>Usagers
            <p>
        </div>
    </a>
    <a href="consultations.php">
        <div class="item">
            <img class='icon' src='/img/icons/date_icon.png' alt='icone_rdv'>
            <p>Rdv
            <p>
        </div>
    </a>
    <a href="stats.php">
        <div class="item">
            <img class='icon' src='/img/icons/stats_icon.png' alt='icone_stats'>
            <p>Statistiques
            <p>
        </div>
    </a>
</div>

{include "footer.html"}
</body>
</html>
