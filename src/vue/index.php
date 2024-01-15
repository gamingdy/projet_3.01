<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
<?php

require_once __DIR__ . '/../dao/dao-rendezvous.class.php';
require_once __DIR__ . '/../dao/dao-usager.class.php';
require_once __DIR__ . '/../dao/dao-medecin.class.php';


require_once __DIR__ . '/../model/rendezvous.class.php';
//$usager = new Usager("Doe","John",Civilite::M,"1 rue de la paix","01/01/2000","Paris",123456789);

$daoUsager = new DaoUsager();
$daoMedecin = new DaoMedecin();
$usager = $daoUsager->getUsager(1);
$medecin = $daoMedecin->getMedecin(1);
$nouveauRDV = new RendezVous($usager, $medecin, "2019-01-02", "10:00", 30);

$daoRDV = new DaoRendezVous();
$rdv = $daoRDV->getRendezVousbyDate('2019-01-02');
foreach ($rdv as $r) {
    echo $r->getDateRDV();
    echo "<br>";
}

try {
    $daoRDV->addRendezVous($nouveauRDV);
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo "Après ajout <br>";
$rdv = $daoRDV->getRendezVousbyDate('2019-01-02');
foreach ($rdv as $r) {
    echo $r->getDateRDV();
    echo "<br>";
}
?>
</body>
</html>
