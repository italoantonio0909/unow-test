<?php

namespace Unow\Apps\Medic\Controllers\Create;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class MedicCreateController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getBody();

        $container = \Unow\Apps\DependencyInjection;

        $container->get(\Unow\Contexts\Medic\Application\Create\MedicCreate::class)->__invoke($body);

        return $response;
    }
}
