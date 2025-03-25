<h1>Espace privé</h1>
<p>Bienvenue <?= htmlspecialchars($_SESSION['username']) ?> !</p>

<h2>📚 Ajouter un livre</h2>
<form method="POST">
    <input type="text" name="titre" placeholder="Titre" required>
    <input type="text" name="auteur" placeholder="Auteur" required>
    <input type="number" name="annee" placeholder="Année">
    <input type="text" name="genre" placeholder="Genre">
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<h2>📖 Liste des livres</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
        <th>Genre</th>
        <th>Action</th>
    </tr>
    <?php while ($livre = $livres->fetch_assoc()) : ?>
        <tr>
            <td><?= $livre['id'] ?></td>
            <td><?= $livre['titre'] ?></td>
            <td><?= $livre['auteur'] ?></td>
            <td><?= $livre['annee'] ?></td>
            <td><?= $livre['genre'] ?></td>
            <td>
                <a href="index.php?page=espaceMembre&supprimer=<?= $livre['id'] ?>" onclick="return confirm('T’es sûr ?')">🗑️ Supprimer</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

