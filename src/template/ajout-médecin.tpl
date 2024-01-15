<html>
    <head><title>{$titre}</title></head>
    <body>
        <h1>Ajout d'un médecin</h1>
        <h2>Renseignez les données suivantes :</h2>
        <form name="inscription" method="post" action="form.php">
            Nom : <input type="text" name="nom"/> <br/>
            Prénom : <input type="text" name="prenom"/> <br/>
            Civilité : <input type="radio" name="civilite" value="H"/>Homme<input type="radio" name="sexe" value="F"/>Femme<br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>