<?php

namespace St\Http\Controllers;

class ServiceController extends SiteController
{
    public function showArticle($id)
    {
        $this->setTemplate('service');
        $this->addVars('id', $id);

        /*This is the content of this page*/
        foreach ($this->vars['services'] as $article) {
            if ($article->id == $id) {
                $this->addVars('content', $article);
            }
        }

        return $this->renderOutput();
    }
}
