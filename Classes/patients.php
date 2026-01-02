<?php

require_once __DIR__ ."/user.php";

class patients extends User {
    public function __construct(
        ?int $id,
        string $firstName,
        string $lastName, 
        string $email,
        string $password,
        private ?string $dateofbirth,
        private ?string $address,
        private ?string $phone,
        ){
            parent::__construct($id, $firstName, $lastName, $email, $password );
        }

    public function gitDob(): ?string {return $this->dateofbirth;}
    public function gitAdress(): ?string {return $this->address;}
    public function gitPhone(): ?string {return $this->phone;}

    public function setDob(?string $v): void {$this->dateofbirth = $v;}
    public function setAddress(?string $v): void {$this->address = $v;}
    public function setPhone(?string $v): void {$this->phone = $v;}
}
