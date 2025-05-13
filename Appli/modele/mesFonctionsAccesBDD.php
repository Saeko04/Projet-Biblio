
<?php

// Ajout de la fonction connecte
function connect()
{
    $host = 'localhost';
    $db = 'dblogin4363';
    $user = 'login4363';
    $pass = 'QUeCzgNqXLFCOfK';
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
function getTousLesLivres(PDO $pdo, string $tri = 'cotation'): array {
    // Liste des colonnes autorisées pour éviter toute injection
    $colonnesAutorisees = ['cotation', 'titre', 'auteur'];

    // Sécurité : si la colonne demandée n'est pas autorisée, on remet par défaut sur 'cotation'
    if (!in_array($tri, $colonnesAutorisees)) {
        $tri = 'cotation';
    }

    $sql = "SELECT cotation, titre, auteur, resume FROM livres ORDER BY $tri ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getToutesLesCotations($pdo) {
    $stmt = $pdo->prepare('SELECT DISTINCT cotation FROM livres ORDER BY cotation ASC');
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
    $req = $pdo->prepare('SELECT * FROM livres WHERE id = ?');
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

function getDetailLivre($pdo, $id){
    $stmt = $pdo->prepare('SELECT id, titre, auteur, date_sortie, resume, image FROM livres WHERE id = ?');
    $stmt->execute([$id]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
    return $livre;
}

function getanneesDisponibles($pdo, $dateSortie){
    $pdo->prepare('SELECT DISTINCT YEAR(date_sortie) as annee FROM livres ORDER BY annee DESC');
    $stmt->execute([$dateSortie]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
}

function genresDisponibles($pdo){
    $pdo->prepare('SELECT id_cotation, nom FROM genres');
    $stmt->execute([$genre]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
}

function cotationsDisponibles($pdo){
    $pdo->prepare('SELECT DISTINCT cotation FROM livres ORDER BY cotation');
    $stmt->execute([$cotation]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
}


function chercherLivres($pdo, $titre = '', $auteur = '', $genre = '', $annee = '', $cotation = '', $id = '') {
    $sql = 'SELECT livres.*, genres.nom as nom_genre FROM livres JOIN genres ON livres.cotation = genres.id_cotation WHERE 1=1';

    $params = [];

    if (!empty($titre)) {
        $sql .= ' AND livres.titre LIKE :titre';
        $params[':titre'] = "%$titre%";
    }

    if (!empty($auteur)) {
        $sql .= ' AND livres.auteur LIKE :auteur';
        $params[':auteur'] = "%$auteur%";
    }

    if (!empty($annee)) {
        $sql .= ' AND YEAR(livres.date_sortie) = :annee';
        $params[':annee'] = $annee;
    }

    if (!empty($genre)) {
        $sql .= ' AND livres.cotation = :genre';
        $params[':genre'] = $genre;
    }

    if (!empty($cotation)) {
        $sql .= ' AND livres.cotation = :cotation';
        $params[':cotation'] = $cotation;
    }

    if (!empty($id)) {
        $sql .= ' AND livres.id = :id';
        $params[':id'] = $id;
    }
    

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





?>
