<?php

require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/prescriptions.php";

class PrescriptionRepository extends BaseModel
{
    private function mapRowToPrescription(array $row): Prescription
    {
        return new Prescription(
            $row['id'],
            $row['date'],
            $row['doctor_id'],
            $row['patient_id']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM prescriptions ORDER BY date DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pres = [];
        foreach ($rows as $row) {
            $pres[] = $this->mapRowToPrescription($row);
        }
        return $pres;
    }

    public function findById(int $id): ?Prescription
    {
        $stmt = $this->pdo->prepare("SELECT * FROM prescriptions WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        return $this->mapRowToPrescription($row);
    }

    public function create(Prescription $p): int
    {
        $sql = "INSERT INTO prescriptions (date, doctor_id, patient_id)
                VALUES (:date, :doctor_id, :patient_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'date' => $p->getDate(),
            'doctor_id' => $p->getDoctorId(),
            'patient_id' => $p->getPatientId(),
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(Prescription $p): bool
    {
        $sql = "UPDATE prescriptions SET
                    date       = :date,
                    doctor_id  = :doctor_id,
                    patient_id = :patient_id
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $p->getId(),
            'date' => $p->getDate(),
            'doctor_id' => $p->getDoctorId(),
            'patient_id' => $p->getPatientId(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM prescriptions WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
