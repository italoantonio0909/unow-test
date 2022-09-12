<?php

namespace Unow\Contexts\Reservations\Application\Confirm;

use Unow\Contexts\Reservations\Domain\ReservationRepository;

final class ReservationConfirm
{

    public function __construct(private readonly ReservationRepository $repository)
    {
    }

    public function __invoke(int $reservationId): void
    {

        $this->repository->confirm($reservationId);
    }
}
