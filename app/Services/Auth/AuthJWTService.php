<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use function time;

class AuthJWTService{

    private string $key;
    private int $expirationTime = 60 * 60 * 24; // 60 seconds * 60 minutes * 24 hours = 1 day
    private string $algorithm = 'HS256';

    public function __construct() {
        $this->key = env('JWT_SECRET_KEY');
    }

    public function create(User $user) : string{
        return JWT::encode([
            'user_id' => $user->id,
            'username' => $user->name,
            'role' => $user->role,
            'exp' => time() + $this->expirationTime,
        ], $this->key, $this->algorithm);
    }

    public function get(string $jwt) : UserJWT{
        $decoded = $this->decodeJWT($jwt);
        return new UserJWT($decoded->user_id, $decoded->username, $decoded->role);
    }

    public function decodeJWT(string $jwt) : \stdClass{
        return JWT::decode($jwt, new Key($this->key, $this->algorithm));
    }
}
