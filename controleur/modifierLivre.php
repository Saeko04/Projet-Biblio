<?php
$rootPath = dirname(__DIR__, 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once $rootPath . '/modele/mesFonctionsAccesBDD.php';

// Connexion à la base de données
$pdo = connect();

// Vérifier si l'ID du livre est fourni
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de livre invalide.");
}

$id = $_GET['id'];

// Récupérer les détails du livre
$stmt = $pdo->prepare("SELECT id, titre, auteur, date_sortie, resume FROM livres WHERE id = ?");
$stmt->execute([$id]);
$livre = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livre) {
    die("Livre non trouvé.");
}

// Si le formulaire est soumis, mettre à jour le livre
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_sortie = $_POST['date_sortie'];
    $resume = $_POST['resume'];

    // Mettre à jour les informations du livre dans la base de données
    $updateStmt = $pdo->prepare("UPDATE livres SET titre = ?, auteur = ?, date_sortie = ?, resume = ? WHERE id = ?");
    $updateStmt->execute([$titre, $auteur, $date_sortie, $resume, $id]);

    // Redirection après la mise à jour
    header("Location: detailLivre.php?id=$id");
    exit;
}

echo '<link rel="stylesheet" type="text/css" href="/css/modifierLivre.css">';
include __DIR__ . '/../vue/vueModifierLivre.php';
