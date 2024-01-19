<!DOCTYPE html>
<html lang="fr">
<head>
    <title>{$titre}</title>
    <link rel="stylesheet" href="style/list-usager.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">

</head>
<body>
{include 'header.html'}

<h1>Liste des {$type} </h1>
<div class="conteneur">
    {foreach $individus as $individu}
        <div class="card">
            <img class='sex_icon' src='/img/{$individu->getCivilite()->toString()}.png' alt='icone_personne'>

            <p>Nom : {$individu->getNom()} </p>
            <p>Prenom : {$individu->getPrenom()} </p>

            {if $is_usager}
                <p>Adresse : {$individu->getAdresse()}</p>
                <p> Sécurité sociale : {$individu->getSecuriteSociale()}</p>
                <p> Date de naissance: {$individu->getDateNaissance()} </p>
                <div>
                    <button class="bouton" onclick="window.location.href='/usager.php?id={$individu->getIdUsager()}'">
                        Voir
                    </button>
                    <button class="bouton"
                            onclick="window.location.href='/suppression.php?type=usager&id={$individu->getIdUsager()}'">
                        Supprimer
                    </button>
                </div>
            {else}
                <div>
                    <button class="bouton" onclick="window.location.href='/medecin.php?id={$individu->getIdMedecin()}'">
                        Voir
                    </button>
                    <button class="bouton"
                            onclick="window.location.href='/suppression.php?type=medecin&id={$individu->getIdMedecin()}'">
                        Supprimer
                    </button>
                </div>
            {/if}

        </div>
    {/foreach}

</div>
<div class="big-button">
    <div class='bouton_ajout'>
        <img onclick="window.location.href='/ajout.php?type={$type}'" src='/img/icons/ajouter.png' alt='bouton_ajout'>
    </div>
</div>

{include 'footer.html'}
</body>
</html>

