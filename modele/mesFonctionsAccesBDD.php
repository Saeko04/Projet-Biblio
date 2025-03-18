
<?php

// Ajout de la fonction connecte 
function connect(){
    $host = 'localhost';
    $db   = 'admin';
    $user = 'login4084';
    $pass = 'kPdZlrHdSNQzGgW';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion à la base de données réussie !";
        return $pdo;
    }
    catch (PDOException $e){
        echo "Erreur de connexion : " . $e->getMessage();
        exit;
    }
}

function disconnect(&$pdo){
    $pdo = null;
    echo "Déconnexion de la base de données réussie !";
}

// Fonction qui retourne tous les livres (référence,titre,auteur et résumé)
function getTousLesLivres($pdo) {
    $sql = "SELECT ref, titre, auteur, resume FROM Livres"; 
    $stmt = $pdo->query($sql); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
