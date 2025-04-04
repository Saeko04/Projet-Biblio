<div class="book-detail">
    <h1><?= htmlspecialchars($livre['titre']) ?></h1>
    
    <div class="book-meta">
        <p><strong>Auteur :</strong> <?= htmlspecialchars($livre['auteur']) ?></p>
        <p><strong>Date de sortie :</strong> <?= date('d/m/Y', strtotime($livre['date_sortie'])) ?></p>
        <p><strong>Genre :</strong> <?= htmlspecialchars($genre['nom']) ?></p>
        <p><strong>Cote :</strong> <?= htmlspecialchars($livre['cotation']) ?></p>
    </div>
    
    <div class="book-description">
        <h2>Résumé</h2>
        <p><?= nl2br(htmlspecialchars($livre['resume'])) ?></p>
    </div>
    
    <a href="index.php?action=chercher" class="back-link">← Retour à la recherche</a>
</div>