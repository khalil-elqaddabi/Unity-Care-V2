<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/appointents.php";
require_once __DIR__ . "/../Repositorys/appointmentR.php";
require_once __DIR__ . "/../Repositorys/patientR.php";
require_once __DIR__ . "/../Repositorys/doctorR.php";

$repo = new AppointmentRepository();
$patientRepo = new PatientRepository();
$doctorRepo = new DoctorRepository();

$action = $_GET['action'] ?? 'index';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $app = new Appointment(
        null,
        $_POST['date'] ?? null,
        $_POST['time'] ?? null,
        isset($_POST['patient_id']) && $_POST['patient_id'] !== '' ? (int) $_POST['patient_id'] : null,
        isset($_POST['doctor_id']) && $_POST['doctor_id'] !== '' ? (int) $_POST['doctor_id'] : null,
        $_POST['status'] ?? 'Scheduled'
    );

    $repo->create($app);
    header('Location: appointments.php');
    exit;
}

if ($action === 'delete' && isset($_GET['id'])) {
    $repo->delete((int) $_GET['id']);
    header('Location: appointments.php');
    exit;
}

$appointments = $repo->findAll();
$patients = $patientRepo->findAll();
$doctors = $doctorRepo->findAll();

include __DIR__ . '/../views/appointments/index.php';
