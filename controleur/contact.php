<?php
session_start();

// Variables pour le rendu
$contactError = '';
$contactSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère et nettoie les champs du formulaire
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Vérifications simples
    if (empty($nom) || empty($email) || empty($message)) {
        $contactError = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contactError = 'Adresse email invalide.';
    } else {
        // Ici, tu peux stocker en BDD ou envoyer un email
        // Exemple : mail($emailDestinataire, "Contact de $nom", $message);

        // On considère que l'envoi a réussi
        $contactSuccess = true;
    }
}

// Inclut la vue pour afficher le formulaire ou le message de succès
require __DIR__ . '/../vue/vueContact.php';
