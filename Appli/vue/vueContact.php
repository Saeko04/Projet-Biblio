
    <div class="contact-page-wrapper">
        <h1 class="contact-title">Contact</h1>

        <!-- Affichage d'un message d'erreur -->
        <?php if (!empty($contactError)): ?>
            <p class="contact-message-error"><?= htmlspecialchars($contactError) ?></p>
        <?php endif; ?>

        <!-- Affichage d'un message de succès si l'envoi a réussi -->
        <?php if ($contactSuccess): ?>
            <p class="contact-message-success">Votre message a bien été envoyé.</p>
        <?php else: ?>
            <!-- Formulaire de contact -->
            <form method="POST" action="contact.php" class="contact-form">
                <div class="contact-form-group">
                    <label for="nom" class="contact-form-label">Nom :</label>
                    <input type="text" id="nom" name="nom" class="contact-form-input" required>
                </div>

                <div class="contact-form-group">
                    <label for="email" class="contact-form-label">Email :</label>
                    <input type="email" id="email" name="email" class="contact-form-input" required>
                </div>

                <div class="contact-form-group">
                    <label for="message" class="contact-form-label">Message :</label>
                    <textarea id="message" name="message" class="contact-form-textarea" required></textarea>
                </div>

                <button type="submit" class="contact-form-button">Envoyer</button>
            </form>
        <?php endif; ?>
    </div>
