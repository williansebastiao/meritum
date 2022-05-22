<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $user;

    public function __construct()
    {

    }

    public function register(RegisterRequest $request): object
    {

    }

    public function authenticate(AuthRequest $request): object
    {

    }

    public function me(): object
    {

    }

    public function logout(): object
    {

    }


}
