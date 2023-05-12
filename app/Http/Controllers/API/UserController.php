<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $registerRequest): object
    {
        $payload = $registerRequest->validated();
        return $this->userService->register($payload);
    }

    public function login(LoginRequest $loginRequest): object
    {
        $payload = $loginRequest->validated();
        return $this->userService->login($payload);
    }

    public function me(): object
    {
        return $this->userService->me();
    }

    public function logout(): object
    {
        return $this->userService->logout();
    }
}
