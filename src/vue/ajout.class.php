<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajout d'un patient</title>
    </head>
    <body>
         <form action=".php" method="post">
        </form>                 
    </body>
</html>
/*$email = "someone@domain .local";

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail is not valid";
} else {
    echo "E-mail is valid";
} pour les adresses mails des utilisateurs*/

<?php
//Un champ est vide, on arrête l'exécution du script et on affiche un message d'erreur
if(isset($_POST['prenom'],$_POST['nom'])){
    if(empty($_POST['prenom'])){
        echo "Le prénom n'est pas renseigné.";
    }
    elseif(empty($_POST['nom'])){
        echo "Le nom de famille n'est pas renseigné.";
    }
    elseif(empty($_POST['civilite'])){
        echo "La civilité n'est pas renseignée.";
    }
    elseif(empty($_POST['adresse'])){
        echo "L'adresse n'est pas renseignée.";
    }
    elseif(empty($_POST['datenaissance'])){
        echo "La date de naissance n'est pas renseignée.";
    }
    elseif(empty($_POST['lieunaissance'])){
        echo "Le lieu de naissance n'est pas renseigné.";
    }
    elseif(empty($_POST['numerosecu'])){
        echo "Le numéro de sécurité sociale n'est pas renseigné.";
    }
    elseif(!preg_match("/[A-Za-z]|[à-ü]|[À-Ü]/",$_POST['prenom'])){
        echo "Le prénom doit être renseigné sans caractères spéciaux.";
    }
    elseif(!preg_match("/[A-Za-z]|[à-ü]|[À-Ü]/",$_POST['nom'])){
        echo "Le nom de famille doit être renseigné sans caractères spéciaux.";
    }
    elseif(!preg_match("/[A-Za-z]|[à-ü]|[À-Ü]|[0-9]/",$_POST['adresse'])){
        echo "L'adresse doit être renseigné sans caractères spéciaux.";
    }
    elseif(!preg_match("/[0-9]/",$_POST['datenaissance'])){
        echo "La date de naissance doit être composé que de chiffres.";
    }
    elseif(!preg_match("/[0-9]/",$_POST['numerosecu'])){
        echo "Le numéro de sécurité sociale doit être composé que de chiffres.";
    }
    elseif(strlen($_POST['prenom'])>25){//le pseudo est trop long, il dépasse 25 caractères
        echo "Le prénom est trop long, il dépasse 25 caractères.";
    }
}

?>