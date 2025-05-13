<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once __DIR__ . '/../modele/mesFonctionsAccesBDD.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $pdo = connect();

    if (existe($pdo, $username)) {
        $stmt = $pdo->prepare('SELECT password FROM utilisateurs WHERE username = ?');
        $stmt->execute([$username]);
        $hash = $stmt->fetchColumn();

        if (password_verify($password, $hash)) {
            $_SESSION['username'] = $username;
            $_SESSION['connected'] = true;
            $message = '✅ Connexion réussie, bienvenue ' . htmlspecialchars($username) . ' !';
        } else {
            $message = '❌ Mot de passe incorrect.';
        }
    } else {
        $message = "❌ Nom d'utilisateur inconnu.";
    }

    disconnect($pdo);
}

require __DIR__ . '/../vue/vuelogin.php';

echo '<link rel="stylesheet" type="text/css" href="../css/login.css">';
?>
