<?php

namespace Unow\Apps\DependencyInjection;

require_once '/var/www/vendor/autoload.php';

return $containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions([
    \Unow\Contexts\User\Domain\UserRepository::class => \DI\Create(\Unow\Contexts\User\Infrastructure\UserMysqlRepository::class),
    \Unow\Contexts\User\Application\Create::class => \DI\Create(\Unow\Contexts\User\Infrastructure\UserMysqlRepository::class),
    \Unow\Contexts\User\Application\Search::class => \DI\Create(\Unow\Contexts\User\Infrastructure\UserMysqlRepository::class),

    \Unow\Contexts\Medic\Domain\MedicRepository::class => \DI\Create(\Unow\Contexts\Medic\Infrastructure\MedicMysqlRepository::class),
    \Unow\Contexts\Medic\Application\Create::class => \DI\Create(\Unow\Contexts\Medic\Infrastructure\MedicMysqlRepository::class),

    \Unow\Contexts\Reservations\Domain\ReservationRepository::class => \DI\Create(\Unow\Contexts\Reservations\Infrastructure\ReservationMysqlRepository::class),
    \Unow\Contexts\Reservations\Application\Create::class => \DI\Create(\Unow\Contexts\Reservations\Infrastructure\ReservationMysqlRepository::class),
    \Unow\Contexts\Reservations\Application\Confirm::class => \DI\Create(\Unow\Contexts\Reservations\Infrastructure\ReservationMysqlRepository::class),
    \Unow\Contexts\Reservations\Application\Today::class => \DI\Create(\Unow\Contexts\Reservations\Infrastructure\ReservationMysqlRepository::class),
]);

return $containerBuilder->build();
