<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../modele/mesFonctionsAccesBDD.php';
$conn = connect();

if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_sortie = $_POST['date_sortie'];
    $resume = $_POST['resume'];

    $stmt = $conn->prepare('INSERT INTO livres (titre, auteur, date_sortie, resume) VALUES (?, ?, ?, ?)');
    $stmt->execute([$titre, $auteur, $date_sortie, $resume]);

    header('Location: espaceMembre.php');
    exit;
}

if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];

    $stmt = $conn->prepare('DELETE FROM livres WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: espaceMembre.php');
    exit;
}

// Récupérer tous les livres
$stmt = $conn->query('SELECT * FROM livres ORDER BY id DESC');
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);

disconnect($conn);

require __DIR__ . '/../vue/vueEspaceMembre.php';
