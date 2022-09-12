<?php

declare(strict_types=1);

namespace Unow\Contexts\Shared\Domain\ValueObject;

abstract class BooleanValueObject
{
    public function __construct(protected bool $value)
    {
    }

    public function value(): bool
    {
        return $this->value;
    }
}
