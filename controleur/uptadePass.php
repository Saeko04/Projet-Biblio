<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../modele/mesFonctionsAccesBDD.php';

// Connexion à la base de données via PDO
$pdo = connect();

// Fonction pour hacher un mot de passe
function hacherMotDePasse($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

// Spécifie ici le nom d'utilisateur cible et le nouveau mot de passe
$username = 'admin';  // Remplace par le nom d'utilisateur cible
$nouveauPassword = 'admin123';  // Remplace par le nouveau mot de passe

// Hachage du mot de passe
$motDePasseHache = hacherMotDePasse($nouveauPassword);

// Préparation et exécution de la requête de mise à jour
$sql = 'UPDATE utilisateurs SET password = :password WHERE username = :username';
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([
    ':password' => $motDePasseHache,
    ':username' => $username
]);

if ($result) {
    echo "Le mot de passe de l'utilisateur <strong>" . htmlspecialchars($username) . '</strong> a été mis à jour avec succès.';
} else {
    echo 'Une erreur est survenue lors de la mise à jour du mot de passe.';
}

// Déconnexion de la base de données
disconnect($pdo);
?>
