<?php
$messageEnvoye = false;
$erreur = "";

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation simple des champs
    if (empty($nom) || empty($email) || empty($message)) {
        $erreur = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "Adresse email invalide.";
    } else {
        // Ici, tu peux ajouter un envoi par email ou une insertion en base de données
        $messageEnvoye = true;
    }
}

// Inclure la vue pour affichage
include "vue/vueContact.php";
?>
