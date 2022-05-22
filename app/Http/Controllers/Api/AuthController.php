<?php

namespace App\Http\Controllers\Api;

use App\Business\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * @var UserService
     */
    private $service;

    /**
     * AuthController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param RegisterRequest $request
     * @return object
     */
    public function register(RegisterRequest $request): object
    {
        try {
            return $this->service->register($request->all());
        } catch (\Exception $e) {
            Log::error(['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()]);
            return response()->json(['message' => $e->getMessage(), 'success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param AuthRequest $request
     * @return object
     */
    public function authenticate(AuthRequest $request): object
    {
        try {
            return $this->service->authenticate($request->all());
        } catch (\Exception $e) {
            Log::error(['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()]);
            return response()->json(['message' => $e->getMessage(), 'success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function me(): object
    {
        try {
            return $this->service->me();
        } catch (\Exception $e) {
            Log::error(['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()]);
            return response()->json(['message' => $e->getMessage(), 'success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(): object
    {

    }


}
