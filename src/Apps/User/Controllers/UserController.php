<?php

require_once '/var/www/vendor/autoload.php';

$application = new \Slim\App();

$application->post('/contexts/user/save', function ($request, $response, $args) {
    return $response->withStatus(200)->write();
});

$application->run();
