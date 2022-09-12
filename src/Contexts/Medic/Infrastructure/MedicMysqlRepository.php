
<?php

use Unow\Contexts\Medic\Domain\Medic;
use Unow\Contexts\Medic\Domain\MedicRepository;
use Unow\Contexts\User\Domain\UserEmail;

final class MedicMysqlRepository implements MedicRepository
{
    public function __construct(private $connection)
    {
        $this->connection = mysqli_connect('db', 'root', 'test', "unow");
    }

    public function create(Medic $medic): void
    {

        $medic_name = $medic->name()->value();
        $medic_email = $medic->email()->value();

        mysqli_query($this->connection, "INSERT INTO Medic (name, email) VALUES ('$medic_name', '$medic_email')");
    }

    public function search(UserEmail $email): null
    {
        $query = "SELECT * FROM Medic WHERE email = '$email->value()'";
        $response = mysqli_query($this->connection, $query);
        $results = mysqli_num_rows($response);

        if ($results == 0) {
            return null;
        }
    }
}
