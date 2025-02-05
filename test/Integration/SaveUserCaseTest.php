<?php

use App\Dto\UserDto;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use App\UseCase\SaveUserUseCase;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestDox;
use PHPUnit\Framework\Test;

class SaveUserCaseTest extends TestCase
{
    private $userRepository;
    private UserDto $userDto;

    private  $saveUserUseCase;
    public function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->saveUserUseCase = new SaveUserUseCase($this->userRepository);
        $this->userDto = new UserDto(
            "1",
            "user test", 
            "user@test.com", 
            "password123"
        );
    }

    /**
     * @testdox save user  useCase
     * @test
     */
    public function saveUserCase()
    {
        $this->userRepository
            ->expects($this->once())
            ->method("create")
            ->with($this->userDto);

      ($this->saveUserUseCase)($this->userDto);

    }
}