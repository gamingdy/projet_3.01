<?php
require_once __DIR__ . '/../controller/login.php';
require_once __DIR__ . '/../model/custom-template.class.php';

$template = new CustomTemplate('index.tpl');

$template->assign('titre', 'Accueil');

$template->show();


