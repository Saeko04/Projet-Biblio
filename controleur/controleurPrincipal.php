<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions['defaut'] = 'accueil.php';
    $lesActions['chercher'] = 'chercher.php';
    $lesActions['livres'] = 'livres.php';
    $lesActions['accès'] = 'acces.php';
    $lesActions['contact'] = 'contact.php';
    $lesActions['login'] = 'login.php';
    $lesActions['membre'] = 'espaceMembre.php';
    $lesActions['detail-livre'] = 'detailLivre.php';

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions['defaut'];
    }
}

?>
