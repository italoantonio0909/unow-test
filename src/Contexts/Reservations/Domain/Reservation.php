<?php

namespace Unow\Contexts\Reservations\Domain;

final class Reservation
{

    public function __construct(
        private readonly ReservationTitle $title,
        private readonly ReservationDescription $description,
        private readonly ReservationStatus $status,
        private readonly ReservationUserId $userId,
        private readonly ReservationMedicId $medicId,
        private readonly ReservationCreatedAt $createdAt
    ) {
    }

    public static function create(
        ReservationTitle $title,
        ReservationDescription $description,
        ReservationStatus $status,
        ReservationUserId $userId,
        ReservationMedicId $medicId,
        ReservationCreatedAt $createdAt
    ): self {
        $reservation = new self($title, $description, $status, $userId, $medicId, $createdAt);

        return $reservation;
    }

    public function reservationTitle(): ReservationTitle
    {
        return $this->reservationTitle;
    }

    public function reservationDescription(): ReservationDescription
    {
        return $this->reservationDescription;
    }

    public function reservationStatus(): ReservationStatus
    {
        return $this->reservationStatus;
    }

    public function reservationUserId(): ReservationUserId
    {
        return $this->reservationUserId;
    }

    public function reservationMedicId(): ReservationMedicId
    {
        return $this->reservationMedicId;
    }

    public function reservationCreatedAt(): ReservationCreatedAt
    {
        return $this->reservationCreatedAt;
    }
}
