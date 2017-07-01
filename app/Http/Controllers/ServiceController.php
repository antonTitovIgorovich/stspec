<?php

namespace St\Http\Controllers;

class ServiceController extends SiteController
{
    public function show($id)
    {
        $this->setTemplate('service');
        $this->addVars('id', $id);

        /*This is the content of this view*/
        $content = (object)[];
        foreach ($this->vars['services'] as $article) {
            if ($article->id == $id) {
                $content = $article;
            }
        }

        $this->addVars('content', $content);
        return $this->renderOutput();
    }
}
