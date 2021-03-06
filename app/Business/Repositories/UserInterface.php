<?php


namespace App\Business\Repositories;


interface UserInterface
{
    public function register(Array $data): object;
    public function authenticate(Array $data): object;
    public function me(): object;
    public function logout(): object;
}
