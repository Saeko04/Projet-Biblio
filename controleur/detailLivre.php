<?php
require_once __DIR__ . '/../modele/mesFonctionsAccesBDD.php';

try {
    // Vérification de l'ID
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        throw new Exception("ID de livre invalide");
    }

    $livreId = (int)$_GET['id'];
    $bdd = connexionBDD();

    // Requête principale
    $stmt = $bdd->prepare("
        SELECT Livres.*, Genres.nom as genre_nom 
        FROM Livres 
        JOIN Genres ON Livres.cotation = Genres.id_cotation
        WHERE Livres.id = ?
    ");
    $stmt->execute([$livreId]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livre) {
        throw new Exception("Livre non trouvé");
    }

    //Affiche les données brutes
    echo "<pre>Livre: ";
    print_r($livre);
    echo "</pre>";

    // Inclusion de la vue
    require_once __DIR__ . '/../vue/vueDetailLivre.php';
} catch (Exception $e) {
    $messageErreur = $e->getMessage();
}

$pdo = new PDO("mysql:host=localhost;dbname=biblio", "root", "");
$sql = "SELECT * FROM images";
$stmt = $pdo->query($sql);
