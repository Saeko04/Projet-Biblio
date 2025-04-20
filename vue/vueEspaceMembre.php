<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Membre</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

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

    <!-- Formulaire d'ajout de livre (exemple) -->
    <h2>Ajouter un livre</h2>
    <br>
    <form method="POST">
        <input type="text" name="titre" placeholder="Titre" required>
        <input type="text" name="auteur" placeholder="Auteur" required>
        <input type="date" name="date_sortie" placeholder="Date de sortie" required>
        <input type="text" name="resume" placeholder="Résumé" required>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <!-- Liste des livres (exemple) -->
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
                            <a href="espaceMembre.php?supprimer=<?= $livre['id'] ?>" 
                               onclick="return confirm('Supprimer définitivement ?')">
                               🗑️
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
