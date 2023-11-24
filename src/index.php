<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'model/usager.class.php';
include 'model/civilite.class.php';
$usager = new Usager("Doe","John",Civilite::M,"1 rue de la paix","01/01/2000","Paris",123456789);
echo $usager->getNom();


?>
</body>
</html>
