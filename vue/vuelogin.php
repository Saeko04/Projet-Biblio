<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <style>
    .message-container {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Connexion</h2>

  <div class="message-container">
    <?php if (isset($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>

        <?php if (isset($_SESSION['connected']) && $_SESSION['connected'] === true): ?>
            <div class="redirection-container">
                <p>Redirection en cours...</p>
                <script>
                  setTimeout(() => {
                      window.location.href = '../index.php?action=membre';
                  }, 2000);
                </script>
            </div>
        <?php endif; ?>

    <?php endif; ?>
  </div>

  <form method="POST" action="">
      <input type="text" name="username" placeholder="Nom d'utilisateur" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
  </form>
</div>

</body>
</html>
