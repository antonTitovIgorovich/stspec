<?php

namespace St\Http\Controllers;

use St\Models\Service;

class SiteController extends Controller
{
    protected $template = '';
    protected $vars = [];

    public function __construct()
    {
        $this->addVars('services', Service::all());
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
