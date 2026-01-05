<?php



class Department{

    public function __construct(

        private ?int $id,
        private string $name,
        private ?string $location,

    ){}
    public function getId(): ?int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getLocation(): ?string{
        return $this->location;
    }

    public function setName(string $v): void{
        $this->name = $v;
    }
    public function setLocation(string $v): void{
        $this->location = $v;
    }
}