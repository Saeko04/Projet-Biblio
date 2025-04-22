
<?php

// Ajout de la fonction connecte
function connect()
{
    $host = '192.168.1.156:3306';
    $db = 'dblogin4084';
    $user = 'Rayan';
    $pass = 'Rayan789';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        exit;
    }
}

function disconnect(&$pdo)
{
    $pdo = null;
}

// Fonction qui retourne tous les livres (référence,titre,auteur et résumé)
function getTousLesLivres($pdo)
{
    $sql = 'SELECT cotation, titre, auteur, resume FROM livres';
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ajouterLivre($conn, $titre, $auteur, $date_sortie, $genre)
{
    $stmt = $conn->prepare('INSERT INTO livres (titre, auteur, date_sortie, genre) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssis', $titre, $auteur, $date_sortie, $genre);
    $stmt->execute();
    $stmt->close();
}

function supprimerLivre($conn, $id)
{
    $sql = 'DELETE FROM livres WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

function existe($pdo, $username)
{
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM utilisateurs WHERE username = ?');
    $stmt->execute([$username]);
    return $stmt->fetchColumn() > 0;
}

function getLivreDetails($pdo, $id)
{
    $req = $pdo->prepare('SELECT * FROM givres WHERE id = ?');
    $req->execute([$id]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getGenreByCotation($pdo, $cotation)
{
    $req = $pdo->prepare('SELECT nom FROM genres WHERE id_cotation = ?');
    $req->execute([$cotation]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

function rechercherLivres($pdo, $titre = null, $genre = null)
{
    $sql = 'SELECT l.*, g.nom AS genre_nom FROM livres l
            JOIN genres g ON l.cotation = g.id_cotation
            WHERE 1=1';
    $params = [];

    if ($titre) {
        $sql .= ' AND l.titre LIKE ?';
        $params[] = "%$titre%";
    }

    if ($genre) {
        $sql .= ' AND g.id_cotation = ?';
        $params[] = $genre;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getLivresParCritères($pdo, $titre = null, $genre = null)
{
    $sql = 'SELECT livres.*, Genres.nom as nom_genre 
            FROM livres 
            JOIN genres ON Livres.cotation = Genres.id_cotation
            WHERE 1=1';

    $params = [];

    if (!empty($titre)) {
        $sql .= ' AND livres.titre LIKE :titre';
        $params[':titre'] = "%$titre%";
    }

    if (!empty($genre)) {
        $sql .= ' AND livres.cotation = :genre';
        $params[':genre'] = $genre;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
