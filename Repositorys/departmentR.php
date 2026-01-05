<?php

require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/departments.php";




class DepartmentRepository extends BaseModel
{

    private function mapROwToDepartment(array $row): Department
    {

        return new Department(

            $row["id"],
            $row["name"],
            $row["location"]
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM departments");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $depts = [];
        foreach ($rows as $row) {
            $depts[] = $this->mapROwToDepartment($row);
        }
        return $depts;
    }

    public function findById(int $id): ?Department
    {

        $stmt = $this->pdo->prepare("SELECT * FROM departments WHERE id =:id");
        $stmt->execute(["id" => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return $this->mapROwToDepartment($row);
    }
    public function create(Department $department): int
    {
        $sql = "INSERT INTO departments (name,
        location) VALUES (:name, :location)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "name" => $department->getName(),
            "location" => $department->getLocation(),
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    public function update(Department $department): bool
    {
        $sql = "UPDATE departments SET
        name = :name,
        location = :location
        WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            "id" => $department->getId(),
            "name" => $department->getName(),
            "location" => $department->getLocation(),
        ]);
    }
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM departments WHERE id= :id");
        return $stmt->execute(["id" => $id]);
    }
}