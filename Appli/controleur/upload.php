<?php
$targetDir = "/ProjetCode/img/";  // Dossier où enregistrer les images
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Vérifier si c'est une image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=localhost;dbname=biblio", "root", "");

        // Insérer le chemin de l'image dans la base
        $sql = "INSERT INTO images (nom, chemin) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([basename($_FILES["image"]["name"]), $targetFile]);

        echo "L'image a été uploadée avec succès.";
    } else {
        echo "Erreur lors de l'upload.";
    }
} else {
    echo "Ce fichier n'est pas une image.";
}
?>
