<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{$titre}</title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
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
<h1 class="page">Ajout d'un {$type}</h1>
<form action="ajout.php?type={$type}" method="post">
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
                    <label>Médecin referent:
                        <select name="referent">
                            <option value="-1">Aucun</option>
                            {foreach $medecins as $medecin}
                                <option value="{$medecin->getIdMedecin()}">{$medecin->getNom()} {$medecin->getPrenom()}</option>
                            {/foreach}
                        </select>
                    </label>
                </div>
            {/if}
        </div>
        {if $is_usager}
            <div class="modifiable">
                <div class="un_input">
                    <label for="secu">Sécurité sociale : </label>
                    <input type="text" id="secu" name="secu" autocomplete="off">
                </div>
                <div class="un_input">
                    <label for="anniv">Date de naissance :</label>
                    <input type="text" id="anniv" name="anniv" autocomplete="off"
                           placeholder="jj/mm/AAAA">
                </div>
            </div>
        {/if}
        <div>
            <div class="un_input">
                <label>Sexe :
                    <select name="gender">
                        <option value="M">Male</option>
                        <option value="Mme">Female</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="boutons">
            <input type="submit" id="bouton_valider" value="Valider">
            <a href="javascript:history.back()" id="bouton_valider">Retour</a>
        </div>
    </div>
</form>
<p class="erreur">{$erreur}</p>

{include 'footer.html'}
</body>
</html>