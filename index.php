<?php

use Pecee\SimpleRouter\SimpleRouter;

// Autoload the vendor
require_once __DIR__ . '/vendor/autoload.php';

// Load from environment variables.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('ROOT', __DIR__);
define('VIEWS', __DIR__ . '/views');
define('ASSET_DIR', __DIR__ . '/assets');
define('BASE_DIR', isset($_ENV['BASE_DIR']) ? $_ENV['BASE_DIR'] : '');
define('URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . BASE_DIR);
define('ASSET_URL', URL . '/assets');

/* Load external routes file */
require_once 'routes/route.php';

SimpleRouter::setDefaultNamespace('\App\Controllers');
// Start the routing
SimpleRouter::start();
