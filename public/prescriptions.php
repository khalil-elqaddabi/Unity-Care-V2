<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/prescriptions.php";
require_once __DIR__ . "/../Repositorys/prescriptionR.php";
require_once __DIR__ . "/../Repositorys/patientR.php";
require_once __DIR__ . "/../Repositorys/doctorR.php";

$repo = new PrescriptionRepository();
$patientRepo = new PatientRepository();
$doctorRepo = new DoctorRepository();

$action = $_GET['action'] ?? 'index';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $prescription = new Prescription(
        null,
        $_POST['date'] ?? null,
        isset($_POST['doctor_id']) && $_POST['doctor_id'] !== '' ? (int) $_POST['doctor_id'] : null,
        isset($_POST['patient_id']) && $_POST['patient_id'] !== '' ? (int) $_POST['patient_id'] : null
    );

    $repo->create($prescription);
    header('Location: prescriptions.php');
    exit;
}

if ($action === 'delete' && isset($_GET['id'])) {
    $repo->delete((int) $_GET['id']);
    header('Location: prescriptions.php');
    exit;
}

$prescriptions = $repo->findAll();
$patients = $patientRepo->findAll();
$doctors = $doctorRepo->findAll();

include __DIR__ . '/../views/prescriptions/index.php';
