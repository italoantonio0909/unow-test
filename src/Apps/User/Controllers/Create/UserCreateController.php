<?php

namespace Unow\Apps\User\Controllers\Create;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class UserCreateController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getBody();

        $container = \Unow\Apps\DependencyInjection;

        $container->get(\Unow\Contexts\User\Application\Create\UserCreate::class)->__invoke($body);

        return $response;
    }
}
