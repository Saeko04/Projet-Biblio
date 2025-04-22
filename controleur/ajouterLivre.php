<?php
session_start();
require_once '../modele/mesFonctionsAccesBDD.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'] ?? '';
    $cotation = $_POST['cotation'] ?? '';
    $auteur = $_POST['auteur'] ?? '';
    $date_sortie = $_POST['date_sortie'] ?? '';
    $resume = $_POST['resume'] ?? '';

    if ($titre && $cotation && $auteur && $date_sortie && $resume) {
        $stmt = $pdo->prepare("INSERT INTO livres (titre, cotation, auteur, date_sortie, resume) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$titre, $cotation, $auteur, $date_sortie, $resume]);
        header("Location: espaceMembre.php");
        exit;
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}

// Récupérer les genres
$genres = $pdo->query("SELECT * FROM genres")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Livre</title>
</head>
<body>
    <h2>Ajouter un Livre</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" required>
        
        <label for="cotation">Genre :</label>
        <select name="cotation" required>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= htmlspecialchars($genre['id_cotation']) ?>">
                    <?= htmlspecialchars($genre['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" required>
        
        <label for="date_sortie">Date de sortie :</label>
        <input type="date" name="date_sortie" required>
        
        <label for="resume">Résumé :</label>
        <textarea name="resume" required></textarea>
        
        
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="espaceMembre.php">Retour</a>
</body>
</html>
