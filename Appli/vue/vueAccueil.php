<h1>Accueil</h1>


<h2>Liste des Livres</h2>
<table border="1">
    <tr>
        <th>Référence</th>
        <th>Titre</th>
        <th>Auteur</th>
    </tr>
    <?php if (isset($livres) && !empty($livres)) : ?>
        <?php foreach ($livres as $livre) : ?>
            <tr>
                <td><?= htmlspecialchars($livre['ref']) ?></td>
                <td><?= htmlspecialchars($livre['titre']) ?></td>
                <td><?= htmlspecialchars($livre['auteur']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="3">Aucun livre disponible.</td>
        </tr>
    <?php endif; ?>
</table>
