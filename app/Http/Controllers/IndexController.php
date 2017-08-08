<?php

namespace St\Http\Controllers;

use St\Models\Stock;
use SEO;

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

    public function httpErr($num)
    {
        $this->setTemplate('http_error');
        $this->addVars('numberErr', $num);
        return $this->renderOutput();
    }
}
