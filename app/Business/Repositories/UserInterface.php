<?php


namespace App\Business\Repositories;


interface UserInterface
{
    public function register(Array $data): object;
}
