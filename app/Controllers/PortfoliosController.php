<?php

namespace App\Controllers;

use App\Base\Controller;
use App\Models\Portfolio;

class PortfoliosController extends Controller
{
    public function index()
    {
        $portfolio = new Portfolio();
        $portfolios = $portfolio->get();

        return views('portfolios/index.php', compact('portfolios'));
    }
}
