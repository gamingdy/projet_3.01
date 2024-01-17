<!DOCTYPE html>
<html lang="fr">
<head>
    <title>{$titre}</title>
    <link rel="stylesheet" href="style/list-usager.css">
</head>
<body>
{include 'header.html'}

{foreach $individus as $individu}
    <div class="card">
        <img class='sex_icon' src='/img/{$individu->getCivilite()->toString()}.png' alt='test'>

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

