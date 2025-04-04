<?php
require_once '../modele/mesFonctionsAccesBDD.php';

// Sécurisation d'une fonction pour récupérer une valeur POST propre
function getPostValue($key) {
    return isset($_POST[$key]) ? htmlspecialchars(trim($_POST[$key])) : null;
}

// Ajout d'un livre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $titre = getPostValue('titre');
    $cotation = intval($_POST['cotation']);
    $auteur = getPostValue('auteur');
    $date_sortie = getPostValue('date_sortie');
    $resume = getPostValue('resume');
    $image_url = getPostValue('image_url');

    $stmt = $pdo->prepare("INSERT INTO livres (titre, cotation, auteur, date_sortie, resume, image_url) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titre, $cotation, $auteur, $date_sortie, $resume, $image_url]);

    header("Location: espaceMembre.php");
    exit;
}

// Modification d'un livre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $id = intval($_POST['id']);
    $titre = getPostValue('titre');
    $cotation = intval($_POST['cotation']);
    $auteur = getPostValue('auteur');
    $date_sortie = getPostValue('date_sortie');
    $resume = getPostValue('resume');
    $image_url = getPostValue('image_url');

    $stmt = $pdo->prepare("UPDATE livres SET titre=?, cotation=?, auteur=?, date_sortie=?, resume=?, image_url=? WHERE id=?");
    $stmt->execute([$titre, $cotation, $auteur, $date_sortie, $resume, $image_url, $id]);

    header("Location: espaceMembre.php");
    exit;
}

// Récupération des données du livre pour la modification
$livre = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
    $stmt->execute([$id]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupération des genres
$genres = $pdo->query("SELECT * FROM genres")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $livre ? 'Modifier' : 'Ajouter' ?> un Livre</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 500px; margin: auto; }
        label, input, textarea, select, button { display: block; width: 100%; margin-bottom: 10px; }
        button { background-color: #2ecc71; color: white; padding: 10px; border: none; cursor: pointer; }
        button:hover { background-color: #27ae60; }
    </style>
</head>
<body>
    <h2><?= $livre ? 'Modifier' : 'Ajouter' ?> un Livre</h2>
    <form method="post">
        <?php if ($livre): ?>
            <input type="hidden" name="id" value="<?= $livre['id'] ?>">
        <?php endif; ?>
        <label>Titre: <input type="text" name="titre" value="<?= htmlspecialchars($livre['titre'] ?? '') ?>" required></label>
        <label>Auteur: <input type="text" name="auteur" value="<?= htmlspecialchars($livre['auteur'] ?? '') ?>" required></label>
        <label>Date de sortie: <input type="date" name="date_sortie" value="<?= htmlspecialchars($livre['date_sortie'] ?? '') ?>" required></label>
        <label>Résumé: <textarea name="resume" required><?= htmlspecialchars($livre['resume'] ?? '') ?></textarea></label>
        <label>Image URL: <input type="text" name="image_url" value="<?= htmlspecialchars($livre['image_url'] ?? '') ?>"></label>
        <label>Genre:
            <select name="cotation" required>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= $genre['id_cotation'] ?>" <?= isset($livre) && $livre['cotation'] == $genre['id_cotation'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($genre['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit" name="<?= $livre ? 'modifier' : 'ajouter' ?>">
            <?= $livre ? 'Modifier' : 'Ajouter' ?>
        </button>
    </form>
    <br>
    <a href="espaceMembre.php">Retour</a>
</body>
</html>
