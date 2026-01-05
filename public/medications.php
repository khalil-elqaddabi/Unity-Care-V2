<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/Medications.php";
require_once __DIR__ . "/../Repositorys/MedicationR.php";

$repo   = new MedicationRepository();
$action = $_GET['action'] ?? 'index';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $med = new Medication(
        null,
        $_POST['name']
    );

    $repo->create($med);
    header('Location: medications.php');
    exit;
}

if ($action === 'delete' && isset($_GET['id'])) {
    $repo->delete((int)$_GET['id']);
    header('Location: medications.php');
    exit;
}

$medications = $repo->findAll();

include __DIR__ . '/../views/medications/index.php';
