
<?php

namespace Unow\Contexts\Medic\Application\Create;

use Unow\Contexts\Medic\Domain\Medic;
use Unow\Contexts\Medic\Domain\MedicEmail;
use Unow\Contexts\Medic\Domain\MedicName;
use Unow\Contexts\Medic\Domain\MedicRepository;

final class MedicCreate
{
    public function __construct(private readonly MedicRepository $repository)
    {
    }

    public function __invoke(MedicName $name, MedicEmail $email): void
    {
        $medic = Medic::create($name, $email);

        $this->repository->create($medic);
    }
}
