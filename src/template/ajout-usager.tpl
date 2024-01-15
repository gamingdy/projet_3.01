<html>
    <head><title>{$titre}</title></head>
    <body>
        <h1>Ajout d'un patient</h1>
        <h2>Renseignez les données suivantes :</h2>
        <form name="inscription" method="post" action="form.php">
            Nom : <input type="text" name="nom"/> <br/>
            Prénom : <input type="text" name="prenom"/> <br/>
            Civilité : <input type="radio" name="sexe" value="H"/>Homme<input type="radio" name="sexe" value="F"/>Femme<br/>
            Adresse : <input type="text" name="prenom"/> <br/>
            Date de Naissance : <input type="text" name="datenaissance"/> <br/>
            Lieu de Naissance : <input type="text" name="lieunaissance"/> <br/>
            Sécurité Sociale : <input type="text" name="securitesociale"/> <br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>