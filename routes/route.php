<?php

use App\Controllers\WelcomeController;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get(BASE_DIR . '/', [WelcomeController::class, 'hello']);
