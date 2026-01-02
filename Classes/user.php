<?php

abstract class User
{
    public function __construct(
        protected ?int $id,
        protected string $firstName,
        protected string $lastName,
        protected string $email,

    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setFirst(string $v): void
    {
        $this->firstName = $v;
    }
    public function setLastName(string $v): void
    {
        $this->lastName = $v;
    }
    public function setEmail(string $v): void
    {
        $this->email = $v;
    }

    public function getFULLName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}