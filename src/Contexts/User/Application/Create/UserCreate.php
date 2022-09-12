<?php

namespace Unow\Contexts\User\Application\Create;

use Unow\Contexts\User\Domain\User;
use Unow\Contexts\User\Domain\UserAlreadyExists;
use Unow\Contexts\User\Domain\UserEmail;
use Unow\Contexts\User\Domain\UserPassword;
use Unow\Contexts\User\Domain\UserRepository;

final class UserCreate
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(UserEmail $email, UserPassword $password): void
    {

        $userExists = $this->repository->search($email);

        if (null !== $userExists) {
            throw new UserAlreadyExists();
        }

        $user = User::create($email, $password);

        $this->repository->create($user);
    }
}
