<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    // Write something awesome :)

    public function register(array $payload): object;
    public function login(array $payload): object;
    public function me(): object;
    public function logout(): object;
}
