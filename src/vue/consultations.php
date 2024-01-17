<?php

require_once __DIR__ . '/../dao/dao-rendezvous.class.php';

$daoRendezVous = new DaoRendezVous();
$rendezvous = $daoRendezVous->getAllRendezVous();

$template = new Smarty();
$template->setTemplateDir(__DIR__ . '/../template/');

$template->assign('titre', 'Liste des rendez-vous');
$template->assign('rdvs', $rendezvous);


$template->display('rdvs.tpl');