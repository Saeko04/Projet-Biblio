<?php
session_start();

if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    header('Location: login.php');
    exit;
}

require_once("./modele/mesFonctionsAccesBDD.php");
$conn = connect();

// Ajouter un livre
if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $annee = $_POST['annee'];
    $genre = $_POST['genre'];
    $stmt = $conn->prepare("INSERT INTO livres (titre, auteur, annee, genre) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $titre, $auteur, $annee, $genre);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php?page=espaceMembre");
    exit;
}

// Supprimer un livre
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    $stmt = $conn->prepare("DELETE FROM livres WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php?page=espaceMembre");
    exit;
}

// Récupérer les livres
$livres = $conn->query("SELECT * FROM livres ORDER BY id DESC");

require __DIR__ . '/../vue/vueEspaceMembre.php';
