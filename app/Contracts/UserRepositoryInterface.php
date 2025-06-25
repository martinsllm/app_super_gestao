<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function verifyUser(string $email, string $password);
}
