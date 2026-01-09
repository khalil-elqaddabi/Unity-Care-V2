<?php
session_start();

require_once __DIR__ . "/../config.php";

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email']    ?? '';
    $password = $_POST['password'] ?? '';

    $pdo = Database::getConnection();

    // Search f 3 tables: admin, doctors, patients
    $admin = null;
    $doctor = null;
    $patient = null;
    $role = null;

    // 1. Check admin
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($admin && $password === $admin['password']) {
        $_SESSION['user_id']    = $admin['id'];
        $_SESSION['user_email'] = $admin['email'];
        $_SESSION['role']       = 'admin';
        
        header('Location: admin.php');
        exit;
    }

    // 2. Check doctor
    $stmt = $pdo->prepare("SELECT * FROM doctors WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($doctor && $password === $doctor['password']) {
        $_SESSION['user_id']    = $doctor['id'];
        $_SESSION['user_email'] = $doctor['email'];
        $_SESSION['role']       = 'doctor';
        
        header('Location: medications.php');
        exit;
    }

    // 3. Check patient
    $stmt = $pdo->prepare("SELECT * FROM patients WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($patient && $password === $patient['password']) {
        $_SESSION['user_id']    = $patient['id'];
        $_SESSION['user_email'] = $patient['email'];
        $_SESSION['role']       = 'patient';
        
        header('Location: appointments.php');
        exit;
    }

    // 4. Email/password incorrect
    $error = "Email ou mot de passe incorrect.";
}

include __DIR__ . "/../views/index.php";
