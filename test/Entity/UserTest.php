<?php

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use PHPUnit\Framework\TestDox;
use PHPUnit\Framework\Test;


class UserTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        $this->user = new User('1',"user test", "user@test.com", "password123");
    }
    /**
     * @testdox create user entity
     * @test
     */
    public function User(): void
    {

        $this->assertEquals('1',$this->user->getId());
        $this->assertEquals("user test", $this->user->getName());
        $this->assertEquals("user@test.com", $this->user->getEmail());
        $this->assertEquals("password123", $this->user->getPassword());

    }

    /**
     * @testdox Setters user entity
     * @test
     */
    public function Setters(): void
    {
       
        $this->user->setName("new user test");
        $this->user->setEmail("newUser@test.com");
        $this->user->setPassword("newpassword");

        $this->assertEquals("new user test", $this->user->getName());
        $this->assertEquals("newUser@test.com", $this->user->getEmail());
        $this->assertEquals("newpassword",$this->user->getPassword());
    }
}
