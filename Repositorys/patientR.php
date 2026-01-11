<?php

require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/patients.php";



class PatientRepository extends BaseModel
{
    private function mapROwToPatient(array $row): Patient
    {
        return new Patient(

            $row["id"],
            $row["first_name"],
            $row["last_name"], 
            $row["email"],
            $row["password"],
            $row["date_of_birth"],
            $row["address"],
            $row["phone"]
        );
    }
    public function findAll(): array
    {

        $stmt = $this->pdo->query("SELECT * FROM patients");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $patients = [];
        foreach ($rows as $row) {
            $patients[] = $this->mapROwToPatient($row);
        }
        return $patients;
    }

    public function findById(int $id): ?Patient
    {
        $stmt = $this->pdo->prepare("SELECT * FROM patients 
        WHERE id = :id");
        $stmt->execute(["id" => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return $this->mapROwToPatient($row);
    }
    public function create(Patient $patient): int
    {
        $sql = "INSERT INTO patients (first_name,last_name,email,
        password,date_of_birth,address,phone)
        VALUES (:first_name,:last_name,:email,:password,:date_of_birth,:address,:phone)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "first_name" => $patient->getFirstName(),
            "last_name" => $patient->getLastName(),
            "email" => $patient->getEmail(),
            "password" => $patient->getPassword(),
            "date_of_birth" => $patient->getDob(),
            "address" => $patient->getAdress(),
            "phone" => $patient->getPhone()
        ]);
        return (int) $this->pdo->lastInsertId();
    }
    public function update(Patient $patient): bool
    {
        $sql = "UPDATE patients SET 
    first_name = :first_name,
    last_name = :last_name,
    email = :email,
    password = :password,
    date_of_birth =:date_of_birth,
    address = :address,
    phone = :phone
    WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $patient->getId(),
            'first_name' => $patient->getFirstName(),
            'last_name' => $patient->getLastName(),
            'email' => $patient->getEmail(),
            'password' => $patient->getPassword(),
            'date_of_birth' => $patient->getDob(),
            'address' => $patient->getAdress(),
            'phone' => $patient->getPhone(),
        ]);

    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM patients WHERE id =:id');
        return $stmt->execute(['id' => $id]);
    }
}