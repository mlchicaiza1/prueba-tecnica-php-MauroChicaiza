<?php

namespace App\Dto;
use Spatie\LaravelData\Data;

class UserDto
{
    public string $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

}