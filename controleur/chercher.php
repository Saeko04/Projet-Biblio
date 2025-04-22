<?php
$rootPath = dirname(__DIR__, 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once $rootPath . '/modele/mesFonctionsAccesBDD.php';

if (!function_exists('connect')) {
    die('ERREUR: Fonctions de base de données non chargées');
}

$pdo = connect();

// Récupération des paramètres de recherche
$titre = $_GET['titre'] ?? '';
$auteur = $_GET['auteur'] ?? '';
$genreSelectionne = $_GET['genre'] ?? '';
$dateSortie = $_GET['date_sortie'] ?? '';

$genresDisponibles = $pdo->query('SELECT id_cotation, nom FROM genres')->fetchAll();

$sql = 'SELECT livres.*, genres.nom as nom_genre 
        FROM livres 
        JOIN genres ON livres.cotation = genres.id_cotation
        WHERE 1=1';

$params = [];

if (!empty($titre)) {
    $sql .= ' AND livres.titre LIKE :titre';
    $params[':titre'] = "%$titre%";
}

if (!empty($auteur)) {
    $sql .= ' AND livres.auteur LIKE :auteur';
    $params[':auteur'] = "%$auteur%";
}

if (!empty($dateSortie)) {
    $sql .= ' AND livres.date_sortie = :date_sortie';
    $params[':date_sortie'] = $dateSortie;
}

if (!empty($genreSelectionne)) {
    $sql .= ' AND livres.cotation = :genre';
    $params[':genre'] = $genreSelectionne;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'vue/vueChercher.php';
?>
