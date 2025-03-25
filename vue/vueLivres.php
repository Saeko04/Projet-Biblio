<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des livres</title>
    <link rel="stylesheet" type="text/css" href="../css/livre.css">
</head>
<body>
    <h1>Voici l'ensemble des livres que l'on possède</h1>

    <div class="livre-container">
        <?php

        include_once __DIR__ . '/../modele/mesFonctionsAccesBDD.php';
        $pdo = connect();
        $livres = getTousLesLivres($pdo);

        foreach ($livres as $livre) {
            echo "<div class='livre'>";
            echo '<strong>Cotation :</strong> ' . $livre['cotation'] . '<br>';
            echo '<strong>Titre :</strong> ' . $livre['titre'] . '<br>';
            echo '<strong>Auteur :</strong> ' . $livre['auteur'] . '<br>';
            echo '<strong>Résumé :</strong> ' . $livre['resume'] . '<br>';
            echo '</div>';
        }

        disconnect($objpdo);

        ?>
    </div>
</body>
</html>
