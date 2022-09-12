<?php

namespace Unow\Contexts\Reservations\Domain;

final class Reservation
{

    public function __construct(
        private readonly ReservationTitle $title,
        private readonly ReservationDescription $description,
        private readonly ReservationStatus $status,
        private readonly ReservationUserId $user_id,
        private readonly ReservationMedicId $medic_id,
        private readonly ReservationCreatedAt $created_at
    ) {
    }

    public static function create(
        ReservationTitle $title,
        ReservationDescription $description,
        ReservationStatus $status,
        ReservationUserId $user_id,
        ReservationMedicId $medic_id,
        ReservationCreatedAt $created_at
    ): self {
        $reservation = new self($title, $description, $status, $user_id, $medic_id, $created_at);

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
