<?php

namespace Unow\Contexts\User\Application\Search;

use Unow\Contexts\User\Domain\User;
use Unow\Contexts\User\Domain\UserEmail;
use Unow\Contexts\User\Domain\UserRepository;

final class UserSearch
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(UserEmail $email): User
    {
        return  $this->repository->search($email);
    }
}
