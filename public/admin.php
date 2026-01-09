<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit;
}

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Classes/BaseModel.php';
require_once __DIR__ . '/../Classes/Patients.php';
require_once __DIR__ . '/../Classes/Doctors.php';
require_once __DIR__ . '/../Classes/Departments.php';
require_once __DIR__ . '/../Repositorys/patientR.php';
require_once __DIR__ . '/../Repositorys/doctorR.php';
require_once __DIR__ . '/../Repositorys/departmentR.php';
require_once __DIR__ . '/../Repositorys/appointmentR.php';
require_once __DIR__ . '/../Repositorys/prescriptionR.php';
require_once __DIR__ . '/../Repositorys/medicationR.php';

$patientRepo = new PatientRepository();
$doctorRepo = new DoctorRepository();
$departmentRepo = new DepartmentRepository();
$appointmentRepo = new AppointmentRepository();
$medicationRepo = new MedicationRepository();
$PrescriptionRepo = new PrescriptionRepository();


$totalPatients = count($patientRepo->findAll());
$totalDoctors = count($doctorRepo->findAll());
$totalDepartments = count($departmentRepo->findAll());
$totalAppointments = count($appointmentRepo->findAll());
$totalmedications = count($medicationRepo->findAll());
$totalprescriptions = count($PrescriptionRepo->findAll());

include __DIR__ . '/../admin/index.php';

