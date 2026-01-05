<?php

require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/doctors.php";

class DoctorRepository extends BaseModel
{
    private function mapRowToDoctor(array $row): Doctor
    {
        return new Doctor(
            $row["id"],
            $row["first_name"],
            $row["last_name"],
            $row["email"],
            $row["password"],
            $row["specialisation"],
            $row["department_id"]
        );
    }

    public function findAll(): array
    {
        $stmt  = $this->pdo->query("SELECT * FROM doctors");
        $rows  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $doctors = [];

        foreach ($rows as $row) {
            $doctors[] = $this->mapRowToDoctor($row);
        }

        return $doctors;
    }

    public function findById(int $id): ?Doctor
    {
        $stmt = $this->pdo->prepare("SELECT * FROM doctors WHERE id = :id");
        $stmt->execute(["id" => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->mapRowToDoctor($row);
    }

    public function create(Doctor $doctor): int
    {
        $sql = "INSERT INTO doctors (
                    first_name,
                    last_name,
                    specialisation,
                    email,
                    password,
                    department_id
                ) VALUES (
                    :first_name,
                    :last_name,
                    :specialisation,
                    :email,
                    :password,
                    :department_id
                )";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "first_name"     => $doctor->getFirstName(),
            "last_name"      => $doctor->getLastName(),
            "email"          => $doctor->getEmail(),
            "password"       => $doctor->getPassword(),
            // smiyat placeholders khas tkoun nafs li f SQL
            "specialisation" => $doctor->getSpecialisation(),
            "department_id"  => $doctor->getDepartmentId(),
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    public function update(Doctor $doctor): bool
    {
        $sql = "UPDATE doctors SET
                    first_name     = :first_name,
                    last_name      = :last_name,
                    email          = :email,
                    password       = :password,
                    specialisation = :specialisation,
                    department_id  = :department_id
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            
            "id"             => $doctor->getId(),
            "first_name"     => $doctor->getFirstName(),
            "last_name"      => $doctor->getLastName(),
            "email"          => $doctor->getEmail(),
            "password"       => $doctor->getPassword(),
            "specialisation" => $doctor->getSpecialisation(),
            "department_id"  => $doctor->getDepartmentId(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM doctors WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
