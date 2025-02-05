<?php

namespace App\Controller;

use App\Dto\UserDto;
use App\UseCase\SaveUserUseCase;


class UserController
{
    private SaveUserUseCase $saveUserUseCase;

    public function __construct(SaveUserUseCase $saveUserUseCase)
    {
        $this->saveUserUseCase = $saveUserUseCase;
    }

    public function create(array $request): UserDto
    {
        $userDto = new UserDto(
            $request["id"],
            $request['name'],
            $request['email'],
            $request['password']
        );
        $this->saveUserUseCase->__invoke($userDto);

        return $userDto;
    }
}
