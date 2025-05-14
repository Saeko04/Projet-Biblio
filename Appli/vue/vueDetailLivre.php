<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du livre - <?= htmlspecialchars($livre['titre']) ?></title>
    <link rel="stylesheet" type="text/css" href="/css/detailLivre.css">
</head>

<body>
    <div class="container">
        <h1><?= htmlspecialchars($livre['titre']) ?></h1>
        <p><strong>Auteur :</strong> <?= htmlspecialchars($livre['auteur']) ?></p>
        <p><strong>Année :</strong> <?= htmlspecialchars($livre['date_sortie']) ?></p>
        <p><strong>Description :</strong></p>
        <p><?= nl2br(htmlspecialchars($livre['resume'])) ?></p>

        <?php if (!empty($livre['image'])): ?>
            <h3>Couverture :</h3>
            <img src="data:image/jpeg;base64,<?= base64_encode($livre['image']) ?>" alt="Couverture du livre">
        <?php endif; ?>
        

        <a href="../controleur/modifierLivre.php?id=<?= $livre['id'] ?>">Modifier ce livre</a>
        <br><br>
        <a href="index.php">Retour à la liste</a>
    </div>

</body>

</html>