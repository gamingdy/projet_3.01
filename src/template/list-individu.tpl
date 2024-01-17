<!DOCTYPE html>
<html lang="fr">
<head>
    <title>{$titre}</title>
    <link rel="stylesheet" href="style/list-usager.css">
    <style>
        .centered-button {
            text-align: center;
            margin-top: 10px;
            margin-right: 130px;
        }

        .big-button {
            padding: 30px 60px;
            font-size: 22px; /* Ajustez la taille de la police selon vos besoins */
        }
    </style>
</head>
<body>
{include 'header.html'}

<div class="centered-button">
    <button class="big-button" onclick="window.location.href='/ajout.php'">Ajouter un usager</button>
</div>
{foreach $individus as $individu}
    <div class="card">

        <p>Nom : {$individu->getNom()} </p>
        <p>Prenom : {$individu->getPrenom()} </p>

        {if $is_usager}
            <p>Adresse : {$individu->getAdresse()}</p>
            <p> Sécurité sociale : {$individu->getSecuriteSociale()}</p>
            <p> Date de naissance: {$individu->getDateNaissance()} </p>
            <a href="/usager.php?id={$individu->getIdUsager()}">Voir</a>
        {else}
            <a href="/medecin.php?id={$individu->getIdMedecin()}">Voir</a>
        {/if}


    </div>
{/foreach}
</body>
</html>

