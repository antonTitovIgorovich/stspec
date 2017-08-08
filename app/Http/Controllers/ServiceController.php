<?php

namespace St\Http\Controllers;
use SEO;

class ServiceController extends SiteController
{
    public function show($id)
    {
        $this->setTemplate('service');

        $serviceCollect = $this->vars['services'];
        $content = $serviceCollect->filter(
            function ($article) use ($id) {
                return $article->id == $id;
            })->first();

        SEO::setTitle($content->title);
        SEO::setDescription($content->title);

        $this->addVars('content', $content);
        return $this->renderOutput();
    }
}
