
<?php

namespace Unow\Contexts\User\Infrastructure;

use Unow\Contexts\User\Domain\User;
use Unow\Contexts\User\Domain\UserEmail;
use Unow\Contexts\User\Domain\UserRepository;

final class UserMysqlRepository implements UserRepository
{
    public function __construct(private $connection)
    {
        $this->connection = mysqli_connect('db', 'root', 'test', "unow");
    }

    public function create(User $user): void
    {

        $user_email = $user->email()->value();
        $user_password = $user->password()->value();

        mysqli_query($this->connection, "INSERT INTO User (email, password) VALUES ('$user_email', '$user_password')");
    }

    public function search(UserEmail $email): null
    {
        $query = "SELECT * FROM User WHERE email = '$email->value()'";

        $response = mysqli_query($this->connection, $query);

        $results = mysqli_num_rows($response);

        $row = mysqli_fetch_array($response);

        if ($results == 0) {
            return null;
        }

        return $row;
    }
}
