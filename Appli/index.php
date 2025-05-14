<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Accueil – Ma Bibliothèque</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>

<?php
  include "inc/header.inc";
  include "controleur/controleurPrincipal.php";

  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }

  $fichier = controleurPrincipal($action);
  include "controleur/$fichier";
  include "inc/footer.inc";
?>

</body>
</html>
