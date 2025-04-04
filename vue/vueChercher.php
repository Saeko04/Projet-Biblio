<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de livres</title>
    <link rel="stylesheet" href="../css/chercher.css">
</head>
<body>
    <div class="container">
        <h1>Recherche de livres</h1>
        
        <form method="GET" action="index.php" class="search-form">
            <input type="hidden" name="action" value="chercher">
            
            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" 
                       value="<?= htmlspecialchars($titre ?? '') ?>"
                       placeholder="Entrez un titre...">
            </div>
            
            <div class="form-group">
                <label for="genre">Genre :</label>
                <select id="genre" name="genre" class="form-control">
                    <option value="">Tous les genres</option>
                    <?php foreach ($genresDisponibles as $genre): ?>
                        <option value="<?= $genre['id_cotation'] ?>" 
                            <?= ($genreSelectionne == $genre['id_cotation']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($genre['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <?php if (isset($livres)): ?>
            <section class="results">
                <h2>Résultats (<?= count($livres) ?>)</h2>
                
                <?php if (empty($livres)): ?>
                    <p class="no-results">Aucun livre trouvé.</p>
                <?php else: ?>
                    <div class="book-list">
                        <?php foreach ($livres as $livre): ?>
                            <article class="book-card">
                                <a href="index.php?action=detail-livre&id=<?= $livre['id'] ?>" class="book-link">
                                    <h3><?= htmlspecialchars($livre['titre']) ?></h3>
                                    <div class="book-meta">
                                        <span class="genre"><?= htmlspecialchars($livre['nom_genre']) ?></span>
                                        <?php if (!empty($livre['auteur'])): ?>
                                            <span class="author"><?= htmlspecialchars($livre['auteur']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    </div>
</body>
</html>
