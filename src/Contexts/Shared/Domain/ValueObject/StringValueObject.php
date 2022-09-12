<?php

namespace Unow\Contexts\Shared\Domain\ValueObject;

abstract class StringValueObject
{

    public function __construct(protected string $value)
    {
        $this->$value = $value;
    }

    function value(): string
    {
        return $this->value;
    }
}
