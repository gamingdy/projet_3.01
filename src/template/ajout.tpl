<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
    {if $is_usager}
        <link rel="stylesheet" href="style/usager.css">
    {else}
        <link rel="stylesheet" href="style/medecin.css">
    {/if}
    <style>
        .erreur {
            color: red;
            font-size: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
{include 'header.html'}
<h1>Ajout d'un {$type}</h1>

<div class="main">
    <div class="modifiable">
        <div class="un_input">
            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom" autocomplete="on">
        </div>
        <div class="un_input">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" autocomplete="on">
        </div>
        {if $is_usager}
            <div class="un_input">
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" autocomplete="on">
            </div>
            <div class="un_input">
                <label for="choix_medecin">Médecin referent:</label>
                <input type="text" id="choix_medecin" name="medecin" autocomplete="on">
            </div>
        {/if}
    </div>
    {if $is_usager}
        <div class="non-modifiable">
            <div class="un_input">
                <label for="Sécurité sociale">Sécurité sociale : </label>
                <input type="text" id="Sécurité sociale" name="Sécurité sociale" autocomplete="off">
            </div>
            <div class="un_input">
                <label for="Date de naissance">Date de naissance :</label>
                <input type="text" id="Date de naissance:" name="Date de naissance" autocomplete="off">
            </div>
        </div>
    {/if}
    <div class="boutons">
        <a href="javascript:history.back()" id="bouton_retour">Retour</a>
    </div>
</div>
<p class="erreur">{$erreur}</p>

</body>
</html>