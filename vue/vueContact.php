<h1>Contact</h1>

<!-- Affichage des erreurs ou confirmation -->
<?php if (!empty($erreur)): ?>
    <p style="color: red;"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<?php if ($messageEnvoye): ?>
    <p style="color: green;">Votre message a bien été envoyé.</p>
<?php else: ?>
    <!-- Formulaire de contact -->
    <form method="POST" action="contact.php">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
<?php endif; ?>
