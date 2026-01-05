<?php


require_once __DIR__ ."/../config.php";
require_once __DIR__ ."/../Classes/BaseModel.php";
require_once __DIR__ ."/../Classes/user.php";
require_once __DIR__ ."/../Classes/doctors.php";
require_once __DIR__ ."/../Repositorys/doctorR.php";



$repo = new DoctorRepository();

$action = $_GET["action"] ?? 'index';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

 $doctor = new Doctor(
        null,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $passwordHash,
        $_POST['specialisation'],
        isset($_POST['department_id']) && $_POST['department_id'] !== ''
            ? (int)$_POST['department_id']
            : null
    

    );

    $repo->create($doctor);
    header('LOCATION: doctors.php');
    exit;

}

if ($action === 'delete'&& isset($_GET['id']) ) {
    $repo->delete((int)$_GET['id']);
    header('LOCATION: doctors.php');
    exit;
}
$doctors = $repo->findAll();

include __DIR__ .'/../views/doctors/index.php';