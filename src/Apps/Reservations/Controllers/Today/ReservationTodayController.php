<?php

namespace Unow\Apps\Reservations\Controllers\Today;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ReservationTodayController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getQueryParams()['reservationId']();

        $container = \Unow\Apps\DependencyInjection;

        $container->get(\Unow\Contexts\Reservations\Application\Today\ReservationToday::class)->__invoke($body);

        return $response;
    }
}
