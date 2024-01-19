<?php
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../dao/dao-rendezvous.class.php';

$daoRendezVous = new DaoRendezVous();
$rendezvous = $daoRendezVous->getAllRendezVous();