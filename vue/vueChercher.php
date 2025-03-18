<h1>Recherche de livres</h1>

<form method="GET" action="chercher.php">
    <label for="query">Rechercher un livre :</label>
    <input type="text" id="query" name="query" placeholder="Titre ou Auteur" required>
    <button type="submit">Rechercher</button>
</form>

<?php if (isset($_GET['query'])): ?>
    <h2>Résultats de la recherche :</h2>
    <?php if (!empty($livres)): ?>
        <ul>
            <?php foreach ($livres as $livre): ?>
                <li><strong><?= htmlspecialchars($livre['titre']) ?></strong> - 
                    <?= htmlspecialchars($livre['auteur']) ?> (Réf: <?= htmlspecialchars($livre['ref']) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun livre trouvé.</p>
    <?php endif; ?>
<?php endif; ?>


