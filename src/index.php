<?php

declare(strict_types=1);

namespace Unow;

require_once '/var/www/vendor/autoload.php';

(require_once '../Context/Apps/DependencyInjection')->run();

(require_once '../Context/Apps/User/Routes')();

(require_once '../Context/Apps/Medic/Routes')();

(require_once '../Context/Apps/Reservations/Routes')();
