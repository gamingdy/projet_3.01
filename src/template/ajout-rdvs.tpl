<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/ajoutRdv.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <title>Formulaire de Rendez-vous</title>
</head>
<body>
{include 'header.html'}

<h2>Formulaire de Rendez-vous</h2>
<div class="main">
    <form action="ajout-rdv.php" method="post">
        <div class="combobox">
            <div class="un_input">
                <label for="usager">Usager :
                    <select name="usager">
                        {foreach $usagers as $usager}
                            <option value="{$usager->getIdUsager()}">{$usager->getNom()} {$usager->getPrenom()}</option>
                        {/foreach}
                    </select>
                </label>
            </div>
            <div class="un_input">
                <label for="medecin">Médecin :
                    <select name="medecin">
                        {foreach $medecins as $medicin}
                            <option value="{$medicin->getIdMedecin()}">{$medicin->getNom()} {$medicin->getPrenom()}</option>
                        {/foreach}
                    </select>
                </label>
            </div>
        </div>
        <div class="un_input">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="un_input">
            <label for="heure">Heure :</label>
            <input type="time" id="heure" name="heure" required>
        </div>
        <div class="un_input">
            <label for="duree">Durée (en minutes) :</label>
            <input type="number" id="duree" name="duree" required>
        </div>
        <div class="boutons">
            <button type="submit" id="bouton_valider" value="Valider"> Valider</button>
        </div>
    </form>
</div>
{include 'footer.html'}
</body>
</html>
