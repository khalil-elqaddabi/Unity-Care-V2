<?php

class Prescription
{
    public function __construct(
        private ?int $id,
        private ?string $date,
        private ?int $doctorId,
        private ?int $patientId
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
    public function getDoctorId(): ?int
    {
        return $this->doctorId;
    }
    public function getPatientId(): ?int
    {
        return $this->patientId;
    }

    public function setDate(?string $v): void
    {
        $this->date = $v;
    }
    public function setDoctorId(?int $v): void
    {
        $this->doctorId = $v;
    }
    public function setPatientId(?int $v): void
    {
        $this->patientId = $v;
    }
}
