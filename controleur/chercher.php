<?php
$rootPath = dirname(__DIR__, 1); // Racine du projet

require_once $rootPath . '/modele/mesFonctionsAccesBDD.php';

if (!function_exists('connexionBDD')) {
    die("ERREUR: Fonctions de base de données non chargées");
}

$bdd = connexionBDD();

$titre = $_GET['titre'] ?? '';
$genreSelectionne = $_GET['genre'] ?? '';

$genresDisponibles = $bdd->query("SELECT id_cotation, nom FROM Genres")->fetchAll();

$sql = "SELECT Livres.*, Genres.nom as nom_genre 
        FROM Livres 
        JOIN Genres ON Livres.cotation = Genres.id_cotation
        WHERE 1=1";

$params = [];

if (!empty($titre)) {
    $sql .= " AND Livres.titre LIKE :titre";
    $params[':titre'] = "%$titre%";
}

if (!empty($genreSelectionne)) {
    $sql .= " AND Livres.cotation = :genre";
    $params[':genre'] = $genreSelectionne;
}

$stmt = $bdd->prepare($sql);
$stmt->execute($params);
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);

include "vue/vueChercher.php";
?>
