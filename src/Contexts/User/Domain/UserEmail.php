<?php

declare(strict_types=1);

namespace Unow\Contexts\User\Domain;

use InvalidArgumentException;

use Unow\Contexts\Shared\Domain\ValueObject\StringValueObject;

final class UserEmail extends StringValueObject
{

    public function __construct(string $value)
    {

        $this->ensureIsValidForm($value);

        parent::__construct($value);
    }

    private function ensureIsValidForm(string $value): void
    {
        if (strlen($value) == 0) {
            throw new InvalidArgumentException(sprintf('The email is required.'));
        }
    }
}
