<?php

namespace App\UseCase;

use App\Dto\UserDto;
use App\Repository\UserRepositoryInterface;


class SaveUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(UserDto $userDto): void
    {
        $this->userRepository->create($userDto);
    }
}
