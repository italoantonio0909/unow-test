<?php

namespace Unow\Apps\Reservations\Controllers\Confirm;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ReservationConfirmController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getQueryParams()['reservationId']();

        $container = \Unow\Apps\DependencyInjection;

        $container->get(\Unow\Contexts\Reservations\Application\Confirm\ReservationConfirm::class)->__invoke($body);

        return $response;
    }
}
