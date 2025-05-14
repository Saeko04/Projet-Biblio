<?php

include_once __DIR__ . '/../modele/mesFonctionsAccesBDD.php';
$pdo = connect();
$livres = getTousLesLivres($pdo);

require __DIR__ . '/../vue/vuelivres.php';
?>