<?php
require_once __DIR__ ."/../config.php";
require_once __DIR__ ."/../Classes/BaseModel.php";
require_once __DIR__ ."/../Classes/departments.php";
require_once __DIR__ ."/../Repositorys/departmentR.php";


$repo = new DepartmentRepository();

$action = $_GET["action"] ?? 'index';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $department = new Department(
        null,
        $_POST['name'],
        $_POST['location'],
    );
    $repo->create($department);
    header('LOCATION: departments.php');
    exit;
}

$departments = $repo->findAll();

include __DIR__ .'/../views/departments/index.php';