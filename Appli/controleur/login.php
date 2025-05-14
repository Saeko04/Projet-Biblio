<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require __DIR__ . '/../modele/mesFonctionsAccesBDD.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = connect();

    if (existe($pdo, $username)) {
        $stmt = $pdo->prepare('SELECT password FROM utilisateurs WHERE username = ?');
        $stmt->execute([$username]);
        $password_db = $stmt->fetchColumn();

        if ($password === $password_db) {
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
?>
