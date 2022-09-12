<?php

namespace Unow\Contexts\Medic\Domain;

final class Medic
{
    public function __construct(private readonly MedicName $name, private readonly  MedicEmail $email)
    {
    }

    public static function create(MedicName $name, MedicEmail $email): self
    {
        return new self($name, $email);
    }

    public function name(): MedicName
    {
        return $this->name;
    }

    public function email(): MedicEmail
    {
        return $this->email;
    }
}
