
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

        $reservationTitle = $reservation->reservationTitle()->value();
        $reservationDescription = $reservation->reservationDescription()->value();
        $reservationStatus = $reservation->reservationStatus()->value();
        $reservationUserId = $reservation->reservationUserId()->value();
        $reservationMedicId = $reservation->reservationMedicId()->value();
        $reservationCreatedAt = $reservation->reservationCreatedAt()->value();

        mysqli_query(
            $this->connection,
            "INSERT INTO Reservation (title, description, status, created_at, user_id, medic_id)
            VALUES ('$reservationTitle', '$reservationDescription','$reservationStatus', '$reservationCreatedAt', '$reservationUserId', '$reservationMedicId')"
        );
    }

    public function confirm(int $reservationId): void
    {
        $query = "UPDATE Reservation SET status = true WHERE reservation_id = '$reservationId'";

        mysqli_query($this->connection, $query);
    }

    public function reservationTodayMedic(int $medicId): array
    {
        $query = "
            SELECT Reservation.title, Reservation.description, DATE_FORMAT(Reservation.created_at, ''%Y-%m-%d'') 
            FROM Reservation WHERE DATE_FORMAT(Reservation.created_at, '%Y-%m-%d') = CURDATE() AND medic_id = '$medicId'";

        $response =  mysqli_query($this->connection, $query);

        $reservations = [];

        while ($row = $response->fetch_assoc()) {
            $reservations[] = $row;
        }

        return $reservations;
    }
}
