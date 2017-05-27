<?php

namespace St\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends SiteController
{
    public function index()
    {
        $this->setTemplate('contact');
        return $this->renderOutput();
    }
}
