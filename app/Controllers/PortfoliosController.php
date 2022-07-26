<?php

namespace App\Controllers;

use App\Base\Controller;
use App\Models\Portfolio;

class PortfoliosController extends Controller
{
    public function index()
    {
        $portfolio  = new Portfolio();
        $status     = isset($_GET['status']) ? intval($_GET['status']) : 1;
        $portfolios = $portfolio->get($status);

        return views('portfolios/index.php', compact('portfolios'));
    }
}
