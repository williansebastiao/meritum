<?php


namespace App\Business\Services;


use App\Business\Helpers\Str;
use App\Business\Repositories\UserRepository;

class UserService
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return object
     */
    public function register(Array $data): object
    {
        $arr = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => Str::clearSpecialCharacters($data['phone']),
            'cpf' => Str::clearSpecialCharacters($data['cpf']),
            'password' => bcrypt($data['password']),
        ];
        return $this->repository->register($arr);
    }

    /**
     * @param array $data
     * @return object
     */
    public function authenticate(Array $data): object
    {
        return $this->repository->authenticate($data);
    }

    /**
     * @return object
     */
    public function me(): object
    {
        return $this->repository->me();
    }

    /**
     * @return object
     */
    public function logout(): object
    {
        return $this->repository->logout();
    }

}
