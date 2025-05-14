<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($livre['titre']) ?></title>
    <link rel="stylesheet" href="/Projet-Biblio-main/css/style.css">
</head>

<body>
    <div class="container">
        <h1><?= htmlspecialchars($livre['titre']) ?></h1>

        <div class="livre-details">
            <div class="livre-infos">
                <p><strong>Auteur:</strong> <?= htmlspecialchars($livre['auteur'] ?? 'Inconnu') ?></p>
                <p><strong>Genre:</strong> <?= htmlspecialchars($livre['genre_nom']) ?></p>
                <p><strong>Date de sortie:</strong> <?= htmlspecialchars($livre['date_sortie'] ?? 'N/A') ?></p>
                <p><strong>Description:</strong></p>
                <p><?= nl2br(htmlspecialchars($livre['description'] ?? 'Aucune description disponible')) ?></p>
            </div>
        </div>

        <form action="controleur/upload.php" method="post" enctype="multipart/form-data">
            Sélectionnez une image :
            <input type="file" name="image">
            <input type="submit" name="envoyer" value="Uploader">
        </form>

        <a href="javascript:history.back()" class="btn-retour">← Retour aux résultats</a>
    </div>
</body>

</html>