<div class="container" style="position: relative;">
    <div class="logout-button" style="position: absolute; top: 20px; right: 20px;">
        <a href="../controleur/logout.php"
           style="background-color: #e74c3c; color: #fff; padding: 8px 12px;
           border-radius: 5px; text-decoration: none; font-weight: bold;">
            Déconnexion
        </a>
    </div>

    <h1>Interface Administration</h1>
    <p>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> !</p>

    <h2>Ajouter un livre</h2>
    <form method="POST" action="./index.php?action=membre">
        <input type="text" name="titre" placeholder="Titre" required>
        <input type="text" name="auteur" placeholder="Auteur" required>
        <input type="date" name="date_sortie" required>
        <input type="text" name="resume" placeholder="Résumé" required>
        <button type="submit" name="ajouter" title="Ajouter le livre">Ajouter</button>
    </form>

    <h2>Liste des livres</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date de sortie</th>
                    <th>Résumé</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livres as $livre): ?>
                    <tr>
                        <td><?= htmlspecialchars($livre['id']) ?></td>
                        <td><?= htmlspecialchars($livre['titre']) ?></td>
                        <td><?= htmlspecialchars($livre['auteur']) ?></td>
                        <td><?= htmlspecialchars($livre['date_sortie']) ?></td>
                        <td><?= htmlspecialchars($livre['resume']) ?></td>
                        <td>
                            <form method="POST" action="./index.php?action=membre" onsubmit="return confirm('Supprimer définitivement ?');">
                                <input type="hidden" name="supprimer" value="<?= htmlspecialchars($livre['id']) ?>">
                                <button type="submit" title="Supprimer le livre" style="background: none; border: none; cursor: pointer;">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
