<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
</head>
<body>
<p>Nom : {$individu->getNom()} </p>
<p>Prenom : {$individu->getPrenom()} </p>

{if $is_usager}
    <p>Adresse : {$individu->getAdresse()}</p>
    <p> Sécurité sociale : {$individu->getSecuriteSociale()}</p>
    <p> Date de naissance: {$individu->getDateNaissance()} </p>
{/if}
</body>

</html>
