<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Appointments</title>
</head>

<body>
    <h1>Liste des rendez-vous</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($appointments as $app): ?>
            <tr>
                <td><?= htmlspecialchars($app->getId()) ?></td>
                <td><?= htmlspecialchars($app->getDate() ?? '') ?></td>
                <td><?= htmlspecialchars($app->getTime() ?? '') ?></td>
                <td><?= htmlspecialchars($app->getPatientId() ?? '') ?></td>
                <td><?= htmlspecialchars($app->getDoctorId() ?? '') ?></td>
                <td><?= htmlspecialchars($app->getStatus()) ?></td>
                <td>
                    <a href="appointments.php?action=delete&id=<?= $app->getId() ?>"
                        onclick="return confirm('Supprimer ce rendez-vous ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <h2>Ajouter un rendez-vous</h2>

    <form action="appointments.php?action=create" method="post">
        <label>Date :
            <input type="date" name="date" required>
        </label><br>

        <label>Heure :
            <input type="time" name="time" required>
        </label><br>

        <label>Patient :
            <select name="patient_id">
                <option value="">-- Choisir --</option>
                <?php foreach ($patients as $p): ?>
                    <option value="<?= $p->getId(); ?>">
                        <?= htmlspecialchars($p->getFirstName() . ' ' . $p->getLastName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Doctor :
            <select name="doctor_id">
                <option value="">-- Choisir --</option>
                <?php foreach ($doctors as $d): ?>
                    <option value="<?= $d->getId(); ?>">
                        <?= htmlspecialchars($d->getFullName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Status :
            <select name="status">
                <option value="Scheduled">Scheduled</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </label><br>

        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>