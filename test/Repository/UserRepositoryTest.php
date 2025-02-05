<?php

use App\Dto\UserDto;
use App\Exception\UserDoesNotExistException;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestDox;
use PHPUnit\Framework\Test;

class UserRepositoryTest extends TestCase
{
    private UserRepository $userRepository;
    private UserDto $userDto;
    public function setUp(): void
    {
        $this->userRepository = new UserRepository();
        $this->userDto = new UserDto(
            "1",
            "user test", 
            "user@test.com", 
            "password123"
        );
    }

    /**
     * @testdox create user
     * @test
     */
    public function create(): void
    {
        $this->userRepository->create( $this->userDto);
        $this->assertEquals(
            $this->userDto, 
            $this->userRepository->findOrFail($this->userDto->id));
    }

    /**
     * @testdox update user
     * @test
     */
    public function update(): void
    {
        $this->userRepository->create( $this->userDto);

        $this->userDto->name = "new user test 0.1";
        $this->userRepository->update( $this->userDto, $this->userDto->id );

        $this->assertEquals(
            $this->userDto, 
            $this->userRepository->findOrFail($this->userDto->id));
    }

    /**
     * @testdox delete user
     * @test
     */
    public function delete(): void
    {
        $this->userRepository->create( $this->userDto);

        $this->userRepository->delete($this->userDto->id);

        try {
            $this->userRepository->findOrFail($this->userDto->id);
        } catch (UserDoesNotExistException $e) {
            $this->assertEquals("User {$this->userDto->id} does not exist", $e->getMessage());
            return;
        }

       $this->fail("Expected UserDoesNotExist");

    }

}