<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\User;

class UserJWT{

    private ?User $model = null;

    public function __construct(
        private int $userId,
        private string $username,
        private string $role,
    ){
    }

    public function getUserId(): int{
        return $this->userId;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getRole(): string{
        return $this->role;
    }

    public function getModel(): User{
        if($this->model !== null) {
            return $this->model;
        }
        return $this->model = User::query()->find($this->userId)->first();
    }
}
