<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit;
}
// require_once __DIR__ ."/login.php";
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Classes/BaseModel.php';
require_once __DIR__ . '/../Classes/User.php';
require_once __DIR__ . '/../Classes/patients.php';
require_once __DIR__ . '/../Repositorys/patientR.php';

$repo = new PatientRepository();

$action = $_GET['action'] ?? 'index';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $patient = new Patient(
        null,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $passwordHash,
        $_POST['date_of_birth'] ?? null,
        $_POST['address'] ?? null,
        $_POST['phone'] ?? null
    );

    $repo->create($patient);
    header('Location: patients.php');
    exit;
}

if ($action === 'delete' && isset($_GET['id'])) {
    $repo->delete((int) $_GET['id']);
    header('Location: patients.php');
    exit;
}

$patients = $repo->findAll();

include __DIR__ . '/../views/patients/index.php';
