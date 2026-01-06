<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Prescriptions</title>
</head>
<body>
<h1>Liste des Prescriptions</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Patient</th>
        <th>Doctor</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($prescriptions as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p->getId()) ?></td>
            <td><?= htmlspecialchars($p->getDate() ?? '') ?></td>
            <td><?= htmlspecialchars($p->getPatientId() ?? '') ?></td>
            <td><?= htmlspecialchars($p->getDoctorId() ?? '') ?></td>
            <td>
                <a href="prescriptions.php?action=delete&id=<?= $p->getId() ?>"
                   onclick="return confirm('Supprimer cette prescription ?');">
                    Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<h2>Ajouter une Prescription</h2>

<form action="prescriptions.php?action=create" method="post">
    <label>Date :
        <input type="date" name="date" required>
    </label><br>

    <label>Patient :
        <select name="patient_id">
            <option value="">-- Choisir --</option>
            <?php foreach ($patients as $pat): ?>
                <option value="<?= $pat->getId(); ?>">
                    <?= htmlspecialchars($pat->getFirstName() . ' ' . $pat->getLastName()); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>

    <label>Doctor :
        <select name="doctor_id">
            <option value="">-- Choisir --</option>
            <?php foreach ($doctors as $doc): ?>
                <option value="<?= $doc->getId(); ?>">
                    <?= htmlspecialchars($doc->getFullName()); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>

    <button type="submit">Enregistrer</button>
</form>
</body>
</html>
