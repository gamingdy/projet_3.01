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
        {if $individu->getCivilite()->toString() == 'M'}
            {$sexe = 'homme'}
        {else}
            {$sexe = 'femme'}
        {/if}
        <img class='sex_icon' src='/img/{$sexe}.png' alt='test'>

        <p>Nom : {$individu->getNom()} </p>
        <p>Prenom : {$individu->getPrenom()} </p>

        {if $is_usager}
            <p>Adresse : {$individu->getAdresse()}</p>
            <p> Sécurité sociale : {$individu->getSecuriteSociale()}</p>
            <p> Date de naissance: {$individu->getDateNaissance()} </p>
        {/if}

    </div>
{/foreach}
</body>
</html>

