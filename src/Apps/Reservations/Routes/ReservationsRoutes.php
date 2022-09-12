<?php

namespace Unow\Apps\Reservations\Routes;

use Slim\App;

return function (App $app) {
    $app->post('/contexts/v1/reservations/create', \Unow\Apps\Reservations\Controllers\ReservationCreateController::class);

    $app->post('/contexts/v1/reservations/confirm/:reservationId', \Unow\Apps\Reservations\Controllers\ReservationConfirmController::class);

    $app->get('/contexts/v1/reservations/today/:medicId',  \Unow\Apps\Reservations\Controllers\ReservationTodayController::class);
};
