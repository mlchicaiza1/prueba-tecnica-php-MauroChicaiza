<?php 
namespace App\Entity;

class User
{
    private string $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $id, string $name, string $email, string $password){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function toArray(): array{
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "email"=> $this->email,
        ];
    }
}


