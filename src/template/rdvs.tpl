<!DOCTYPE html>
<html lang="fr">
<head>
    <title>{$titre}</title>
    <link rel="stylesheet" href="style/list-usager.css">
</head>
<body>
{include 'header.html'}

{foreach $rdvs as $rdv}
    <div class="card">
        <p>Date: {$rdv->getDateRDV()} </p>
        <p>Heure: {$rdv->getHeureRDV()} </p>
        <p>Durée: {$rdv->getDureeMinutes()}</p>

        {assign var=usager value=$rdv->getUsager()}
        <p>Client: {$usager->getCivilite()->toString()}. {$usager->getNom()} {$usager->getPrenom()}</p>

        {assign var=medecin value=$rdv->getMedecin()}
        <p>Médecin: {$medecin->getCivilite()->toString()}. {$medecin->getNom()} {$medecin->getPrenom()}</p>


    </div>
{/foreach}


</body>
</html>

