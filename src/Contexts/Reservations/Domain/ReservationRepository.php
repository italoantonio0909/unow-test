<?php

namespace Unow\Contexts\Reservations\Domain;

interface ReservationRepository
{
    public function create(Reservation $reservation): void;

    public function confirm(int $reservationId): void;

    public function reservationTodayMedic(int $medicId): array;
}
