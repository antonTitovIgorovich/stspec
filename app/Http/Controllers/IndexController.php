<?php

namespace St\Http\Controllers;

use Illuminate\Http\Request;
use St\Models\Service;
use St\Models\Stock;

class IndexController extends Controller
{
    public function renderPage()
    {
        return view('index', [
            'services' => Service::where('main_page', '1')->get(),
            'stocks' => Stock::all()
        ]);
    }
}
