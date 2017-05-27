<?php

namespace St\Http\Controllers;

use St\Models\Stock;

class IndexController extends SiteController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->setTemplate('index');
        $this->addVars('stocks', Stock::all());
        return $this->renderOutput();
    }
}
