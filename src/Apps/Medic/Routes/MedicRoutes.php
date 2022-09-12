<?php

namespace Unow\Apps\Medic\Routes;

use Slim\App;

return function (App $app) {
    $app->post('/contexts/medic/v1', \Unow\Apps\Medic\Controllers\Create\MedicCreateController::class);
};
