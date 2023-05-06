<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use function time;

class AuthService{

    private string $key;
    private int $expirationTime = 60 * 60 * 24; // 60 seconds * 60 minutes * 24 hours = 1 day
    private string $algorithm = 'HS256';

    public function __construct() {
        $this->key = env('JWT_SECRET_KEY');
    }

    public function set(Request $request, User $user) {
        $request->session()->put('authenticated_user', [
            'user_id' => $user->id,
            'name' => $user->name,
            'role' => $user->role,
        ]);
    }

    public function get(Request $request) : AuthSession{
        $session = $request->session()->get('authenticated_user');
        return new AuthSession($session['user_id'], $session['name'], $session['role']);
    }
}
