<!DOCTYPE html>
<html lang="fr">
<head>
    <title>{$titre}</title>
    <link rel="stylesheet" href="style/rdvs.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">

</head>
<body>
{include 'header.html'}
<h1>Liste des rdv</h1>
<div class="conteneur">
    {foreach $rdvs as $rdv}
        <div class="card">
            <div class="info_rdv_main">
                <div class="info_date">
                    <div class="info_rdv_conteneur">
                        <img src='/img/icons/date_icon.png' alt='icone date'>
                        <p>{$rdv->getDateRDV()} </p>
                    </div>
                    <div class="info_rdv_conteneur">
                        <img id="heure" src='/img/icons/heure_icon.png' alt='icone heure'>
                        <p>{$rdv->getHeureRDV()} </p>
                    </div>
                    <div class="info_rdv_conteneur">
                        <img src='/img/icons/duree_icon.png' alt='icone duree'>
                        <p> {$rdv->getDureeMinutes()} min</p>
                    </div>
                </div>
                <div class="info_personnes">
                    <div class="info_medecin">
                        {assign var=medecin value=$rdv->getMedecin()}
                        <img class='icon_client' src='/img/icons/medecin.png' alt='icone_personne'>
                        <p>{$medecin->getNom()} {$medecin->getPrenom()}</p>
                    </div>
                    <div class="info_client">
                        {assign var=usager value=$rdv->getUsager()}
                        <img class='icon_client' src='/img/{$usager->getCivilite()->toString()}.png'
                             alt='icone_personne'>
                        <p>{$usager->getNom()} {$usager->getPrenom()}</p>
                    </div>
                </div>

                <div class="boutons_modif">
                    <button>Modifier</button>
                    <button class="bouton"
                            onclick="window.location.href='/suppression.php?type=rdv&id={$rdv->getId()}'">Supprimer
                    </button>
                </div>
            </div>
        </div>
    {/foreach}
</div>

<div class="big-button">
    <div class='bouton_ajout'>
        <img onclick="window.location.href='/ajout-rdv.php'" src='/img/icons/ajouter.png' alt='bouton_ajout'>
    </div>
</div>

{include 'footer.html'}
</body>
</html>

