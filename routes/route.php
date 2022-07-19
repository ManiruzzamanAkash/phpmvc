<?php

use App\Controllers\PortfoliosController;
use App\Controllers\WelcomeController;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get(BASE_DIR . '/', [WelcomeController::class, 'hello']);

SimpleRouter::get(BASE_DIR . '/portfolios', [PortfoliosController::class, 'index']);
