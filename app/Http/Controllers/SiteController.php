<?php

namespace St\Http\Controllers;

use St\Repositories\ServiceRepo\ServiceRepo;

class SiteController extends Controller
{
    protected $template = '';
    protected $vars = [];

    public function __construct()
    {
    	$service = new ServiceRepo();
        $this->addVars('services', $service->getAll());
    }

    protected function setTemplate($template)
    {
        $this->template = $template;
    }

    protected function addVars($key, $value)
    {
        $this->vars[$key] = $value;
    }

    protected function renderOutput()
    {
        return view($this->template, $this->vars);
    }
}
