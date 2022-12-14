<?php

namespace Unow\Contexts\Reservations\Application\Create;

use Unow\Contexts\Reservations\Domain\Reservation;
use Unow\Contexts\Reservations\Domain\ReservationCreatedAt;
use Unow\Contexts\Reservations\Domain\ReservationDescription;
use Unow\Contexts\Reservations\Domain\ReservationMedicId;
use Unow\Contexts\Reservations\Domain\ReservationRepository;
use Unow\Contexts\Reservations\Domain\ReservationStatus;
use Unow\Contexts\Reservations\Domain\ReservationTitle;
use Unow\Contexts\Reservations\Domain\ReservationUserId;

final class ReservationCreate
{

    public function __construct(private readonly ReservationRepository $repository)
    {
    }

    public function __invoke(
        ReservationTitle $title,
        ReservationDescription $description,
        ReservationStatus $status,
        ReservationUserId $user_id,
        ReservationMedicId $medicId,
        ReservationCreatedAt $createdAt
    ): void {
        $reservation = Reservation::create($title, $description, $status, $user_id, $medicId, $createdAt);

        $this->repository->create($reservation);
    }
}
