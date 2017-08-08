<?php

namespace St\Http\Controllers;

class ContactController extends SiteController
{
    public function index()
    {
        $this->setTemplate('contact');
        $this->addVars('title', 'Контакты');
        return $this->renderOutput();
    }
}
