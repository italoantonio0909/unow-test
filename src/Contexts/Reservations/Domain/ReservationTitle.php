<?php

namespace Unow\Contexts\Reservations\Domain;

use InvalidArgumentException;
use Unow\Contexts\Shared\Domain\ValueObject\StringValueObject;

final class ReservationTitle extends StringValueObject
{

    public function __construct(string $value)
    {
        $this->ensureFormatValid($value);

        parent::__construct($value);
    }

    private function ensureFormatValid(string $value): void
    {
        if (strlen($value) == 0) {
            throw new InvalidArgumentException(sprintf('The title is required.'));
        }
    }
}
