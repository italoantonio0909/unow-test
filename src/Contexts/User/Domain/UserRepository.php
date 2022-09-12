<?php

namespace Unow\Contexts\User\Domain;

interface UserRepository
{
    public function create(User $user): void;

    public function search(UserEmail $email): ?User;
}
