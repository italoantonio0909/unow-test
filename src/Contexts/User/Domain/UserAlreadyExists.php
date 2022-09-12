<?php

declare(strict_types=1);

namespace Unow\Contexts\User\Domain;

use Unow\Contexts\Shared\Domain\DomainError;

final class UserAlreadyExists extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_already_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The user already exist');
    }
}
