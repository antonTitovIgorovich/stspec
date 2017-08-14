<?php

namespace St\Http\Controllers;

class ServiceController extends SiteController
{
    public function show($id)
    {
        $this->setTemplate('service');

        $content = $this->vars['services']->filter(
            function ($article) use ($id) {
                return $article->id == $id;
            })->first();

        $this->addVars('content', $content);
        return $this->renderOutput();
    }
}
