<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
{include 'header.html'}

<h3>Informations sur les usagers</h3>
<table>
    <thead>
    <tr>
        <th></th>
        <th>Moins de 25 ans</th>
        <th>Entre 25 et 50 ans</th>
        <th>Plus de 50 ans</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Femme</td>
        <td>{$femme_stat[0]}</td>
        <td>{$femme_stat[1]}</td>
        <td>{$femme_stat[2]}</td>
    </tr>
    <tr>
        <td>Homme</td>
        <td>{$homme_stat[0]}</td>
        <td>{$homme_stat[1]}</td>
        <td>{$homme_stat[2]}</td>
    </tr>
    </tbody>
</table>

<h3>Informations sur les médecins</h3>
<table>
    <thead>
    <tr>
        <th>Informations médecins</th>
        <th>Temps de consultation</th>
    </tr>
    </thead>
    <tbody>
    {foreach $medecins as $medecin}
        <tr>
            <td>{$medecin[0]->getCivilite()->toString()}
                . {$medecin[0]->getPrenom()|capitalize} {$medecin[0]->getNom()|capitalize}</td>
            <td>{$medecin[1]} H</td>
        </tr>
    {/foreach}
    </tbody>
</table>

</body>
</html>