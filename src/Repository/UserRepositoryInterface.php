<?php 

namespace App\Repository;

use App\Dto\UserDto;

interface UserRepositoryInterface
{
    public function create(UserDto $userDto):void;
    public function update(UserDto $userDto, $id):void;
    public function findOrFail(string $id):?UserDto;
    public function getAll():array;

    public function delete($id):void;


}