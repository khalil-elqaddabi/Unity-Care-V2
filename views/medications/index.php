<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Médicaments</title>
</head>
<body>
<h1>Liste des Médicaments</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($medications as $med): ?>
        <tr>
            <td><?= htmlspecialchars($med->getId()) ?></td>
            <td><?= htmlspecialchars($med->getName()) ?></td>
            <td>
                <a href="medications.php?action=delete&id=<?= $med->getId() ?>"
                   onclick="return confirm('Supprimer ce médicament ?');">
                    Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<h2>Ajouter un Médicament</h2>

<form action="medications.php?action=create" method="post">
    <label>Nom :
        <input type="text" name="name" required>
    </label><br>

    <button type="submit">Enregistrer</button>
</form>

</body>
</html>
