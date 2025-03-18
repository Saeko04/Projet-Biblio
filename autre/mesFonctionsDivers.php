<?php
// fonction qui retourne tous les livres
function getTousLesLivres($pdo) {
    $sql = "SELECT ref, titre, auteur FROM Livres"; 
    $stmt = $pdo->query($sql); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


try {
    // Connexion à la base de données 
    $pdo = new PDO("mysql:host=localhost;dbname=login4170;charset=utf8", "login4170", "SChESdpPlSnKCXp");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    // Appel de la fonction
    $livres = getTousLesLivres($pdo);

    // Affichage des résultats
    foreach ($livres as $livre) {
        echo "Référence: " . $livre['ref'] . " - Titre: " . $livre['titre'] . " - Auteur: " . $livre['auteur'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}




?>