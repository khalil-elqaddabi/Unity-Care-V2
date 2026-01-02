<?php

require_once __DIR__ ."/../config.php";
require_once __DIR__ ."/../Classes/baswModel.php";
require_once __DIR__ ."/../Classes/user.php";
require_once __DIR__ ."/../Classes/patients.php";
require_once __DIR__ ."/../Repositorys/patientR.php";


$repo = new PatientRepository();

$action = $_GET["action"] ?? 'index';

if($action ==='create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $patient = new patients(
        null,
        $_POSR['first_name'],
        $_POSR['last_name'],
        $_POSR['email'],
        $passwordHash,
        $_POST['date_of_birth'] ?? null ,
        $_POST['address'] ?? null,
        $_POST['phone'] ?? null
    );
    $repo->create($patient);
    header('LOCATION: patients.php');
    exit;
}
$patients = $repo->findAll();
include __DIR__ .'/../views/patients/index.php';