<?php
require_once dirname(__DIR__ ) . '/config/constants.php';
require_once APP_PATH . '/vendor/autoload.php';
require_once APP_PATH . '/config/data.php';
require_once APP_PATH . '/config/helpers/helpers.php';

use App\Kernel\App;

$app = new App();

$app->run();
