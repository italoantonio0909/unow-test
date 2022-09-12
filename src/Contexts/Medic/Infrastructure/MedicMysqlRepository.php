
<?php

namespace Unow\Contexts\Medic\Infrastructure;

use Unow\Contexts\Medic\Domain\Medic;
use Unow\Contexts\Medic\Domain\MedicRepository;

final class MedicMysqlRepository implements MedicRepository
{
    public function __construct(private $connection)
    {
        $this->connection = mysqli_connect('db', 'root', 'test', "unow");
    }

    public function create(Medic $medic): void
    {

        $medicName = $medic->name()->value();
        $medicEmail = $medic->email()->value();

        mysqli_query(
            $this->connection,
            "INSERT INTO Medic (name, email) VALUES ('$medicName', '$medicEmail')"
        );
    }
}
