<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/data.php';

use App\App;

$app = new App();

$app->run();