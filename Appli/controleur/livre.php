<?php
include_once "../modele/mesFonctionsAccesBDD.php";

// Vérification de l'ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php?action=accueil');
    exit;
}

$idLivre = (int)$_GET['id'];
$bdd = connexionBDD();

// Récupération des données
$livre = getLivreDetails($bdd, $idLivre);
$genre = getGenreByCotation($bdd, $livre['cotation']);

if (!$livre) {
    header('Location: index.php?action=accueil');
    exit;
}

include "../vue/vueLivre.php";

?>

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