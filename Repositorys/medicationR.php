<?php

require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/Medications.php";

class MedicationRepository extends BaseModel
{
    private function mapRowToMedication(array $row): Medication
    {
        return new Medication(
            $row['id'],
            $row['name']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM medications ORDER BY name");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $medications = [];
        foreach ($rows as $row) {
            $medications[] = $this->mapRowToMedication($row);
        }
        return $medications;
    }

    public function findById(int $id): ?Medication
    {
        $stmt = $this->pdo->prepare("SELECT * FROM medications WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        return $this->mapRowToMedication($row);
    }

    public function create(Medication $medication): int
    {
        $sql = "INSERT INTO medications (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $medication->getName(),
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(Medication $medication): bool
    {
        $sql = "UPDATE medications SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $medication->getId(),
            'name' => $medication->getName(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM medications WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
