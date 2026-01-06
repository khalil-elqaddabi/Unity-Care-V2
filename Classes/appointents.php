<?php

class Appointment
{
    public function __construct(
        private ?int $id,
        private ?string $date,
        private ?string $time,
        private ?int $patientId,
        private ?int $doctorId,
        private string $status = 'Scheduled'
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getDate(): ?string
    {
        return $this->date;
    }
    public function getTime(): ?string
    {
        return $this->time;
    }
    public function getPatientId(): ?int
    {
        return $this->patientId;
    }
    public function getDoctorId(): ?int
    {
        return $this->doctorId;
    }
    public function getStatus(): string
    {
        return $this->status;
    }

    public function setDate(?string $v): void
    {
        $this->date = $v;
    }
    public function setTime(?string $v): void
    {
        $this->time = $v;
    }
    public function setPatientId(?int $v): void
    {
        $this->patientId = $v;
    }
    public function setDoctorId(?int $v): void
    {
        $this->doctorId = $v;
    }
    public function setStatus(string $v): void
    {
        $this->status = $v;
    }
}
