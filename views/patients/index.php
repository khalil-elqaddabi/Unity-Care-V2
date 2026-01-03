<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Patients</title>
</head>
<body>
<h1>Liste des patients</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nom complet</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Date de naissance</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($patients as $patient): ?>
        <tr>
            <td><?= htmlspecialchars($patient->getId()) ?></td>
            <td><?= htmlspecialchars($patient->getFullName()) ?></td>
            <td><?= htmlspecialchars($patient->getEmail()) ?></td>
            <td><?= htmlspecialchars($patient->getPhone() ?? '') ?></td>
            <td><?= htmlspecialchars($patient->getDob() ?? '') ?></td>
            <td><?= htmlspecialchars($patient->getAdress() ?? '') ?></td>
            <td>
                <a href="patients.php?action=delete&id=<?= $patient->getId() ?>"
                   onclick="return confirm('Supprimer ce patient ?');">
                    Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Ajouter un patient</h2>
<form action="patients.php?action=create" method="post">
    <label>Prénom:
        <input type="text" name="first_name" required>
    </label><br>
    <label>Nom:
        <input type="text" name="last_name" required>
    </label><br>
    <label>Email:
        <input type="email" name="email" required>
    </label><br>
    <label>Mot de passe:
        <input type="password" name="password" required>
    </label><br>
    <label>Date de naissance:
        <input type="date" name="date_of_birth">
    </label><br>
    <label>Adresse:
        <input type="text" name="address">
    </label><br>
    <label>Téléphone:
        <input type="text" name="phone">
    </label><br>
    <button type="submit">Enregistrer</button>
</form>
</body>
</html>
