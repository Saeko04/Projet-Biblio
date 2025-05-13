<?php
$rootPath = dirname(__DIR__, 1);
require_once $rootPath . '/modele/mesFonctionsAccesBDD.php';

$pdo = connect();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID du livre non valide.");
}

$livre = getDetailLivre($pdo, $id);

if (!$livre) {
    die("Livre non trouvé.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_sortie = $_POST['date_sortie'];
    $resume = $_POST['resume'];

    // Appeler la fonction pour mettre à jour le livre
    mettreAJourLivre($pdo, $id, $titre, $auteur, $date_sortie, $resume);

    // Redirection après la mise à jour
    header("Location: /controleur/detailLivre.php?id=$id");
    exit;
}

include __DIR__ . '/../inc/header.inc';
echo '<link rel="stylesheet" type="text/css" href="/css/modifierLivre.css">';
include __DIR__ . '/../vue/vueModifierLivre.php';
include __DIR__ . '/../inc/footer.inc';
