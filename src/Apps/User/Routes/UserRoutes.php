<?php

namespace Unow\Apps\User\Routes;

use Slim\App;

return function (App $app) {
    $app->post('/contexts/user/v1', \Unow\Apps\User\Controllers\Create\UserCreateController::class);
};
