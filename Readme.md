# Unity Care V2

## Project Overview
Unity Care V2 enhances the backend web application for Unity Care Clinic with multi-role authentication using PHP sessions, medical appointment management, and prescription handling while maintaining OOP architecture from previous versions. The project targets three user roles: Admin, Doctor, and Patient, each with specific permissions. Development uses HTML5, PHP, MySQL, Git, JavaScript, CSS3, SQL, and UML.[page:1]

## Key Features
- **Authentication System**: Abstract User class with Admin, Doctor, and Patient subclasses; login via email/password with hashed passwords using `password_hash()` and `password_verify()`.
- **Role-Based Access Control (RBAC)**: Permissions table defines actions per role (e.g., Admin manages departments/medications, Doctors create prescriptions, Patients view own appointments).[page:1]
- **Appointments Management**: CRUD operations for appointments with fields like date, time, doctor, patient, reason, and status (scheduled/done/cancelled).
- **Prescriptions Management**: Classes for Medication and Prescription linking doctor, patient, medication, and dosage instructions.
- **Security**: XSS protection via output escaping, SQL injection prevention with PDO prepared statements, CSRF tokens on forms, secure session handling.
- **Dashboard Stats**: Enhanced statistics on appointments by status/doctor/monthly trends and top prescribed medications.
- **Bonus Features**: Intelligent appointment slots (AJAX-updated available times 09:00-17:00 in 30min slots); simple router/controllers.[page:1]

## Tech Stack & Resources
- **Core Technologies**: PHP 8 OOP, MySQL, PDO, JavaScript (vanilla), HTML5/CSS3, SQL.
- **Key Resources**:
  - [PHP Sessions Documentation](https://www.php.net/manual/en/book.session.php)[page:1]
  - [Database Schema](https://simplonline-v3-prod.s3.eu-west-3.amazonaws.com/media/image/png/2025-12-28-23-51-46-untitled-dbdiagram-io-mozilla-firefox-private-browsing-6951b4ab2c443484159528.png)[page:1]
  - OWASP cheatsheets for XSS/CSRF prevention[page:1]

## User Stories
- US01: Users login with email/password.
- US04: Patients book appointments with doctors.
- US08: Doctors create prescriptions for patients.
- US10: Admins manage medications and view all appointments.
- US12: All forms protected against CSRF/XSS.[page:1]

## Setup Instructions
1. Clone the GitHub repository.
2. Install dependencies (PHP 8+, MySQL).
3. Import SQL script with test data (create config file for DB credentials).
4. Test accounts: Provide default Admin/Doctor/Patient credentials in repo.
5. Access via local server (e.g., Laragon); ensure `.htaccess` for routing if implemented.
6. Run `composer install` if using Composer for any libs.[page:1]

## Deliverables & Timeline
- **Timeline**: Launched 29/12/2025; due 09/01/2026 (9 days).
- **Required**: Jira/Trello plan, GitHub repo with README/code/SQL/UML class/use-case/ERD diagrams, hosted demo link.
- **Evaluation**: 15min demo (5min backoffice, 10min code explanation) + 1h OOP challenge.[page:1]

## Performance Criteria
- Secure auth/sessions with role redirects.
- OOP quality: Encapsulation, inheritance, BaseModel for CRUD.
- Code: DRY, commented, error handling; optimized SQL.
- Security: PDO, validation, hashing, CSRF/XSS protection.[page:1]
