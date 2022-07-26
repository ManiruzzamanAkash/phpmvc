<?php

use App\Base\Router;
use App\Controllers\PortfoliosController;
use App\Controllers\WelcomeController;

Router::get('/', [WelcomeController::class, 'hello']);
Router::get('portfolios', [PortfoliosController::class, 'index']);
