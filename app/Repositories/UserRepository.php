<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function verifyUser(string $email, string $password)
    {
        return $this->user
            ->where("email", $email)
            ->where("password", $password)
            ->first();
    }
}
