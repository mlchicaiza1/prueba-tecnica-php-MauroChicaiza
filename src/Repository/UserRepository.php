<?php 

namespace App\Repository;

use App\Dto\UserDto;
use App\Entity\User;
use App\Exception\UserDoesNotExistException;

class UserRepository implements UserRepositoryInterface
{
    /** @var User[]*/
    private array $users = [];

    public function create(UserDto $userDto):void
    {
        $user = $this->toUser($userDto);
        $this->users[$user->getId()] = $user;

    }
    public function update(UserDto $userDto, $id):void
    {
        if (isset($this->users[$id]))
        {
            $user = $this->toUser($userDto);
            $this->users[$id] = $user;
        }
    }
    public function findOrFail(string $id): ?UserDto
    {
        if (isset($this->users[$id])){
            return $this->toUserDto($this->users[$id]);
        }
        throw new UserDoesNotExistException("User {$id} does not exist");
    }
    public function getAll():array
    {
        return $this->users;
    }

    public function delete($id):void
    {
        if (!isset($this->users[$id])) {
            throw new UserDoesNotExistException("User {$id} does not exist");
        }
        unset($this->users[$id]);
    }

    public static function toUser(UserDto $userDto):User
    {
        return new User(
            $userDto->id, 
            $userDto->name, 
            $userDto->email, 
            $userDto->password);
    }

    public static function toUserDto(User $user):UserDto
    {
        return new UserDto(
            $user->getId(), 
            $user->getName(), 
            $user->getEmail(), 
            $user->getPassword()
        );
    }
}