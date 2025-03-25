
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

function ajouterLivre($conn, $titre, $auteur, $annee, $genre) {
    $stmt = $conn->prepare("INSERT INTO livres (titre, auteur, annee, genre) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $titre, $auteur, $annee, $genre);
    $stmt->execute();
    $stmt->close();
}

function supprimerLivre($conn, $id) {
    $sql = "DELETE FROM livres WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function existe($pdo, $username){
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);
    return $stmt->fetchColumn() > 0;
}

function getLivreDetails($bdd, $id) {
    $req = $bdd->prepare("SELECT * FROM Livres WHERE id = ?");
    $req->execute([$id]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getGenreByCotation($bdd, $cotation) {
    $req = $bdd->prepare("SELECT nom FROM Genres WHERE id_cotation = ?");
    $req->execute([$cotation]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

function rechercherLivres($bdd, $titre = null, $genre = null) {
    $sql = "SELECT l.*, g.nom AS genre_nom FROM Livres l
            JOIN Genres g ON l.cotation = g.id_cotation
            WHERE 1=1";
    $params = [];

    if ($titre) {
        $sql .= " AND l.titre LIKE ?";
        $params[] = "%$titre%";
    }

    if ($genre) {
        $sql .= " AND g.id_cotation = ?";
        $params[] = $genre;
    }

    $stmt = $bdd->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getLivresParCritères($bdd, $titre = null, $genre = null) {
    $sql = "SELECT Livres.*, Genres.nom as nom_genre 
            FROM Livres 
            JOIN Genres ON Livres.cotation = Genres.id_cotation
            WHERE 1=1";
    
    $params = [];
    
    if (!empty($titre)) {
        $sql .= " AND Livres.titre LIKE :titre";
        $params[':titre'] = "%$titre%";
    }
    
    if (!empty($genre)) {
        $sql .= " AND Livres.cotation = :genre";
        $params[':genre'] = $genre;
    }
    
    $stmt = $bdd->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
