<?php

namespace Unow\Apps\Reservations\Controllers\Create;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ReservationCreateController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getQueryParams()['reservationId']();

        $container = \Unow\Apps\DependencyInjection;

        $container->get(\Unow\Contexts\Reservations\Application\Create\ReservationCreate::class)->__invoke($body);

        return $response;
    }
}
