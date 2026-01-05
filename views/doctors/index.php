<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Doctors</title>
</head>

<body>
    <h1>Liste des Doctors</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nom complet</th>
            <th>Email</th>
            <th>Specialisation</th>
            <th>Department Id</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($doctors as $doctor): ?>
            <tr>
                <td><?= htmlspecialchars($doctor->getId()) ?></td>
                <td><?= htmlspecialchars($doctor->getFullName()) ?></td>
                <td><?= htmlspecialchars($doctor->getEmail()) ?></td>
                <td><?= htmlspecialchars($doctor->getSpecialisation() ?? '') ?></td>
                <td><?= htmlspecialchars($doctor->getDepartmentId() ?? '') ?></td>
                <td>
                    <a href="doctors.php?action=delete&id=<?= $doctor->getId() ?>"
                        onclick="return confirm('Supprimer ce doctor ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Ajouter un doctor</h2>

    <form action="doctors.php?action=create" method="post">
        <label>Prénom :
            <input type="text" name="first_name" required>
        </label><br>

        <label>Nom :
            <input type="text" name="last_name" required>
        </label><br>

        <label>Email :
            <input type="email" name="email" required>
        </label><br>

        <label>Mot de passe :
            <input type="password" name="password" required>
        </label><br>

        <label>Spécialisation :
            <input type="text" name="specialisation">
        </label><br>

        <label>Department id :
            <input type="text" name="department_id">
        </label><br>

        <button type="submit">Enregistrer</button>
    </form>

</body>

</html>