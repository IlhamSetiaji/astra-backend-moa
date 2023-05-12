<?php

namespace App\Services\User;

use App\Helpers\ResponseFormatter;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class UserServiceImplement extends Service implements UserService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)

    public function register(array $payload): object
    {
        try {
            $payload['password'] = Hash::make($payload['password']);
            $user = $this->mainRepository->create($payload);
            $user->assignRole('user');
            $token = $user->createToken('auth_token')->plainTextToken;
            $response = [
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user->load('roles'),
            ];
            return ResponseFormatter::success($response, 'User Registered');
        } catch (Exception $err) {
            return ResponseFormatter::error($err, 'Something went wrong', 500);
        }
    }

    public function login(array $payload): object
    {
        try {
            $user = $this->mainRepository->findBy('email', $payload['email']);
            if (!$user || !Hash::check($payload['password'], $user->password)) {
                return ResponseFormatter::error(null, 'Invalid Credentials', 401);
            }
            $token = $user->createToken('auth_token')->plainTextToken;
            $response = [
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user->load('roles'),
            ];
            return ResponseFormatter::success($response, 'Authenticated');
        } catch (Exception $err) {
            Log::error($err->getMessage());
            return ResponseFormatter::error($err, 'Something went wrong', 500);
        }
    }

    public function me(): object
    {
        try {
            $user = request()->user();
            return ResponseFormatter::success($user->load('roles'), 'Success get user data');
        } catch (Exception $err) {
            Log::error($err->getMessage());
            return ResponseFormatter::error($err, 'Something went wrong', 500);
        }
    }

    public function logout(): object
    {
        try {
            $user = request()->user();
            $user->currentAccessToken()->delete();
            return ResponseFormatter::success(null, 'Token Revoked');
        } catch (Exception $err) {
            Log::error($err->getMessage());
            return ResponseFormatter::error($err, 'Something went wrong', 500);
        }
    }
}
