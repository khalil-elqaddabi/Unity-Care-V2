<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Departments</title>
</head>

<body>
    <h1>Liste des Departments</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
        </tr>

        <?php foreach ($departments as $department): ?>
            <tr>
                <td><?= htmlspecialchars($department->getId()) ?></td>
                <td><?= htmlspecialchars($department->getName()) ?></td>
                <td><?= htmlspecialchars($department->getLocation()) ?></td>
                <td>
                    <a href="departments.php?action=delete&id=<?= $department->getId() ?>"
                        onclick="return confirm('Supprimer ce department ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Ajouter un department</h2>

    <form action="departments.php?action=create" method="post">
        <label>Name :
            <input type="text" name="name" required>
        </label><br>

        <label>location :
            <input type="text" name="location" required>
        </label><br>

        <button type="submit">Enregistrer</button>
    </form>

</body>

</html>