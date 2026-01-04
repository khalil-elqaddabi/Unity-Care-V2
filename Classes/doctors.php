<?php

require_once __DIR__ . "/user.php";


class Doctor extends User
{

    public function __construct(

        ?int $id,
        string $firstName,
        string $lastName,
        string $email,
        ?string $password,
        private string $specialisation,
        private ?int $departmentId

    ) {
        parent::__construct($id, $firstName, $lastName, $email, $password);
    }

    public function getspecialisation(): string
    {
        return $this->specialisation;
    }
    public function getDepartmentId(): ?int
    {
        return $this->departmentId;
    }


    public function setspecialisation(string $v): void
    {
        $this->specialisation = $v;
    }
    public function setdepartmentId(?int $v): void
    {
        $this->departmentId = $v;
    }
}