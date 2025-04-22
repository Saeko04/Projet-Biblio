<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Initialisation
require_once __DIR__ . '/../modele/mesFonctionsAccesBDD.php';

try {
    // Vérification de l'ID
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        throw new Exception('ID de livre invalide');
    }

    $livreId = (int) $_GET['id'];
    $pdo = connect();

    // Requête principale
    $stmt = $pdo->prepare('
        SELECT livres.*, genres.nom as genre_nom 
        FROM livres 
        JOIN genres ON livres.cotation = genres.id_cotation
        WHERE livres.id = ?
    ');
    $stmt->execute([$livreId]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livre) {
        throw new Exception('Livre non trouvé');
    }

    // DEBUG: Afficher les données brutes (à retirer en production)
    echo '<pre>Livre: ';
    print_r($livre);
    echo '</pre>';

    // Inclusion de la vue
    require_once __DIR__ . '/../vue/vueDetailLivre.php';
} catch (Exception $e) {
    $messageErreur = $e->getMessage();
    require_once __DIR__ . '/../vue/vueErreur.php';
}

$pdo = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
$sql = 'SELECT * FROM images';
$stmt = $pdo->query($sql);

?>