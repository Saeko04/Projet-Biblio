<?php
require_once '../modele/mesFonctionsAccesBDD.php'; // Connexion à la BDD

// Modification d'un livre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $cotation = $_POST['cotation'];
    $auteur = $_POST['auteur'];
    $date_sortie = $_POST['date_sortie'];
    $resume = $_POST['resume'];
    $image_url = $_POST['image_url'];

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
</head>
<body>
    <h2><?= $livre ? 'Modifier' : 'Ajouter' ?> un Livre</h2>
    <form method="post">
        <?php if ($livre): ?>
            <input type="hidden" name="id" value="<?= $livre['id'] ?>">
        <?php endif; ?>
        <label>Titre: <input type="text" name="titre" value="<?= $livre['titre'] ?? '' ?>" required></label><br>
        <label>Auteur: <input type="text" name="auteur" value="<?= $livre['auteur'] ?? '' ?>" required></label><br>
        <label>Date de sortie: <input type="date" name="date_sortie" value="<?= $livre['date_sortie'] ?? '' ?>" required></label><br>
        <label>Résumé: <textarea name="resume" required><?= $livre['resume'] ?? '' ?></textarea></label><br>
        <label>Image URL: <input type="text" name="image_url" value="<?= $livre['image_url'] ?? '' ?>"></label><br>
        <label>Genre:
            <select name="cotation" required>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= $genre['id_cotation'] ?>" <?= isset($livre) && $livre['cotation'] === $genre['id_cotation'] ? 'selected' : '' ?>>
                        <?= $genre['nom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <button type="submit" name="<?= $livre ? 'modifier' : 'ajouter' ?>">
            <?= $livre ? 'Modifier' : 'Ajouter' ?>
        </button>
    </form>
    <br>
    <a href="espaceMembre.php">Retour</a>
</body>
</html>
