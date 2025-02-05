<?php

use App\Controller\UserController;
use App\UseCase\SaveUserUseCase;
use App\Repository\UserRepository;

$userRepository = new UserRepository();
$saveUserUseCase = new SaveUserUseCase($userRepository);


$userController = new UserController($saveUserUseCase);

return $userController;