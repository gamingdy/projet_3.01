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
<h1>{$type} {$individu->getPrenom()} {$individu->getNom()}</h1>
{if $is_usager}
    {assign var=id value=$individu->getIdUsager()}
    {assign var=destination value="usager.php"}
{else}
    {assign var=id value=$individu->getIdMedecin()}
    {assign var=destination value="medecin.php"}
{/if}
<form action="{$destination}?id={$id}" method="post">

    <div class="main">
        <div class="modifiable">
            <div class="un_input">
                <label for="prenom">Prenom:</label>
                <input type="text" id="prenom" name="prenom" autocomplete="on" value={$individu->getPrenom()}>
            </div>
            <div class="un_input">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" autocomplete="on" value={$individu->getNom()}>
            </div>
            {if $is_usager}
                <div class="un_input">
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" autocomplete="on" value={$individu->getAdresse()}>
                </div>
                <div class="un_input">
                    <label for="choix_medecin">Médecin referent:</label>
                    <select name="Medecins" id="choix_medecin">
                        {if $individu->getMedecinReferent() != null}
                            {assign var=medecin value=$individu->getMedecinReferent()}
                            <option>{$medecin->getNom()} {$medecin->getPrenom()}</option>
                        {else}
                            <option>Aucun médecin referent</option>
                        {/if}
                    </select>
                </div>
            {/if}
        </div>
        {if $is_usager}
            <div class="non-modifiable">
                <div class="imageC">
                    <img class='sex_icon' src='/img/{$individu->getCivilite()->toString()}.png' alt='test'>
                </div>
                <div class="un_input">
                    <label for="Sécurité sociale">Sécurité sociale : </label>
                    <input type="text" id="Sécurité sociale" name="Sécurité sociale" autocomplete="off"
                           disabled="disabled"
                           value={$individu->getSecuriteSociale()}>
                </div>
                <div class="un_input">
                    <label for="Date de naissance">Date de naissance :</label>
                    <input type="text" id="Date de naissance:" name="Date de naissance" autocomplete="off"
                           disabled="disabled"
                           value={$individu->getDateNaissance()}>
                </div>
            </div>
        {/if}
        <div class="boutons">
            <input type="submit" id="bouton_valider" value="Valider">
            <input type="submit" id="bouton_valider" value="Retour">
        </div>
    </div>
    <p class="erreur">{$erreur}</p>
</form>


</body>

</html>
