<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des livres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .livre {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 10px;
            transition: transform 0.3s ease-in-out;
            display: inline-block;
            vertical-align: top;
        }

        .livre:hover {
            transform: translateY(-10px);
        }

        .livre strong {
            color: #007bff;
        }

        .livre p {
            margin: 10px 0;
            font-size: 14px;
        }

        .livre-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h1>Voici l'ensemble des livres que l'on possède</h1>

    <div class="livre-container">
        <?php

        include_once "modele/mesFonctionsAccesBDD.php";
        $objpdo = connect();
        $livres = getTousLesLivres($objpdo);

        foreach ($livres as $livre) {
            echo "<div class='livre'>";
            echo "<strong>Cotation :</strong> " . $livre["cotation"] . "<br>";
            echo "<strong>Titre :</strong> " . $livre["titre"] . "<br>";
            echo "<strong>Auteur :</strong> " . $livre["auteur"] . "<br>";
            echo "<strong>Résumé :</strong> " . $livre["resume"] . "<br>";
            echo "</div>";
        }

        disconnect($objpdo);

        ?>
    </div>
</body>
</html>
