
<?php

namespace  Unow\Contexts\Reservations\Infrastructure;

use Unow\Contexts\Reservations\Domain\Reservation;
use Unow\Contexts\Reservations\Domain\ReservationRepository;

final class ReservationMysqlRepository implements ReservationRepository
{
    public function __construct(private $connection)
    {
        $this->connection = mysqli_connect('db', 'root', 'test', "unow");
    }

    public function create(Reservation $reservation): void
    {

        $reservation_title = $reservation->reservationTitle()->value();
        $reservation_description = $reservation->reservationDescription()->value();
        $reservation_status = $reservation->reservationStatus()->value();
        $reservation_user_id = $reservation->reservationUserId()->value();
        $reservation_medic_id = $reservation->reservationMedicId()->value();
        $reservation_created_at = $reservation->reservationCreatedAt()->value();

        mysqli_query(
            $this->connection,
            "INSERT INTO Reservation (title, description, status, created_at, user_id, medic_id)
            VALUES ('$reservation_title', '$reservation_description','$reservation_status', '$reservation_created_at', '$reservation_user_id', '$reservation_medic_id')"
        );
    }

    public function confirm(int $reservationId): void
    {
        $query = "UPDATE Reservation SET status = true WHERE reservation_id = '$reservationId'";

        mysqli_query($this->connection, $query);
    }

    public function reservationTodayMedic(int $medicId): array
    {
        $query = "SELECT * FROM Reservation WHERE medic_id = '$medicId'";
        $response =  mysqli_query($this->connection, $query);

        $reservations = [];

        while ($row = $response->fetch_assoc()) {
            $reservations[] = $row;
        }

        return $reservations;
    }
}
