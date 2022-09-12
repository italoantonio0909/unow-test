<?php

declare(strict_types=1);

namespace Unow\Contexts\Shared\Domain\ValueObject;

abstract class DateTimeValueObject
{

    public function value(): string
    {
        return date('y-m-d h:i:s');
    }
}
