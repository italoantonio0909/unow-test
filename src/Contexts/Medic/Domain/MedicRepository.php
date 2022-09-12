<?php

namespace Unow\Contexts\Medic\Domain;

interface MedicRepository
{
    public function create(Medic $medic): void;
}
