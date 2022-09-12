<?php

declare(strict_types=1);

namespace Unow\Contexts\User\Domain;

final class User
{

    public function __construct(private readonly UserEmail $email, private readonly UserPassword $password)
    {
    }

    public static function create(UserEmail $email, UserPassword $password): self
    {
        return new self($email, $password);
    }


    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }
}
