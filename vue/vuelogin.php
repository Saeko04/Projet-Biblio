<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Gestion de la redirection AVANT tout HTML
if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
    header("Location: ../biblio/index.php?action=membre");
    exit;
}

// Vérification des erreurs et affichage des messages
$message = "";
if (isset($_SESSION['login_error'])) {
    $message = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // On supprime l'erreur après l'affichage
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        .message-container {
            text-align: center;
            margin-bottom: 20px;
            color: red;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Connexion</h2>

    <?php if (!empty($message)): ?>
        <div class="message-container">
            <p><?= htmlspecialchars($message) ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" action="traitement_connexion.php">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</div>

</body>
</html>
