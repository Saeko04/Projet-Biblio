<style>
.loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 1s linear infinite;
    margin: auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<h2>Connexion</h2>

<?php if(isset($message)): ?>
    <p><?= htmlspecialchars($message) ?></p>

    <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === true): ?>
        <div class="loader"></div>
        <script>
            setTimeout(() => {
                window.location.href = '../index.php?action=membre';
            }, 2000);
        </script>
    <?php endif; ?>

<?php endif; ?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
