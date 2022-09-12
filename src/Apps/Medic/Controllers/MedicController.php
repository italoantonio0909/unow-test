<?php

require_once '../vendor/autoload.php';

$application = new \Slim\App();

$application->post('/', function ($request, $response, $args) {
    return $response->withStatus(200)->write('Hello World!');
});

$application->run();
