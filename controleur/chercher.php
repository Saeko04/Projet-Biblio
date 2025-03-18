<?php
include_once "modele/mesFonctionsAccesBDD.php"; // Inclure les fonctions de la BDD

// Vérifier si une recherche est effectuée
$livres = [];
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = trim($_GET['query']);

    // Connexion à la base de données
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=login4170;charset=utf8", "login4170", "SChESdpPlSnKCXp");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL avec recherche par titre ou auteur
        $sql = "SELECT ref, titre, auteur FROM Livres WHERE titre LIKE :query OR auteur LIKE :query";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['query' => "%$query%"]);
        $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Inclure la vue pour afficher les résultats
include "vue/vueChercher.php";
?>
