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

<?php//Un champ est vide, on arrête l'exécution du script et on affiche un message d'erreur
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
  elseif(!preg_match("/^[a-zA-ZéÉ]/",$_POST['prenom'])){
    echo "Le prénom doit être renseigné sans caractères spéciaux.";
  } 
  elseif(!preg_match("/^[a-zA-ZéÉ]/",$_POST['nom'])){
    echo "Le nom de famille doit être renseigné sans caractères spéciaux.";
  } 
  elseif(!preg_match("/^[a-zA-ZéÉ]/",$_POST['adresse'])){
    echo "L'adresse doit être renseigné sans caractères spéciaux.";
  } 
  elseif(!preg_match("/^[a-zA-ZéÉ]/",$_POST['datenaissance'])){
    echo "La date de naissance doit être renseigné sans caractères spéciaux.";
  } 
  elseif(!preg_match("/^[a-zA-ZéÉ]/",$_POST['numerosecu'])){
    echo "Le numéro de sécurité sociale doit être renseigné sans caractères spéciaux.";
  } 
  elseif(strlen($_POST['prenom'])>25){//le pseudo est trop long, il dépasse 25 caractères
    echo "Le prénom est trop long, il dépasse 25 caractères.";
  }
  } 
  elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='".$_POST['pseudo']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
    echo "Ce pseudo est déjà utilisé.";
  } 
  else {
    //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données
    if(!mysqli_query($mysqli,"INSERT INTO membres SET pseudo='".$_POST['pseudo']."')){
      echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
    } else {
      echo "Vous êtes inscrit avec succès!";
      //on affiche plus le formulaire
      $AfficherFormulaire=0;
    }
  }
}
if($AfficherFormulaire==1){
  ?>
  <br />
  <form method="post" action="inscription.php">
    Pseudo (a-z0-9) : <input type="text" name="pseudo">
    <br />
    Mot de passe : <input type="password" name="mdp">
    <br />
    <input type="submit" value="S'inscrire">
  </form>
  <?php
}
?>