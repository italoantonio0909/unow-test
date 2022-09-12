<?php

namespace Unow\Contexts\Reservations\Application\Today;

use Unow\Contexts\Reservations\Domain\ReservationRepository;

final class ReservationToday
{

    public function __construct(private readonly ReservationRepository $repository)
    {
    }

    public function __invoke(int $medicId): void
    {

        $this->repository->reservationTodayMedic($medicId);
    }
}
