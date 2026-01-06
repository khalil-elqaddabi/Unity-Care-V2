<?php

require_once __DIR__ . "/../Classes/BaseModel.php";
require_once __DIR__ . "/../Classes/appointents.php";

class AppointmentRepository extends BaseModel
{
    private function mapRowToAppointment(array $row): Appointment
    {
        return new Appointment(
            $row['id'],
            $row['date'],
            $row['time'],
            $row['patient_id'],
            $row['doctor_id'],
            $row['status']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM appointments ORDER BY date, time");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $apps = [];
        foreach ($rows as $row) {
            $apps[] = $this->mapRowToAppointment($row);
        }
        return $apps;
    }

    public function findById(int $id): ?Appointment
    {
        $stmt = $this->pdo->prepare("SELECT * FROM appointments WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        return $this->mapRowToAppointment($row);
    }

    public function create(Appointment $app): int
    {
        $sql = "INSERT INTO appointments (date, time, patient_id, doctor_id, status)
                VALUES (:date, :time, :patient_id, :doctor_id, :status)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'date' => $app->getDate(),
            'time' => $app->getTime(),
            'patient_id' => $app->getPatientId(),
            'doctor_id' => $app->getDoctorId(),
            'status' => $app->getStatus(),
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(Appointment $app): bool
    {
        $sql = "UPDATE appointments SET
                    date       = :date,
                    time       = :time,
                    patient_id = :patient_id,
                    doctor_id  = :doctor_id,
                    status     = :status
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $app->getId(),
            'date' => $app->getDate(),
            'time' => $app->getTime(),
            'patient_id' => $app->getPatientId(),
            'doctor_id' => $app->getDoctorId(),
            'status' => $app->getStatus(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM appointments WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
