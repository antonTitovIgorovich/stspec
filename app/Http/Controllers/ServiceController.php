<?php

namespace St\Http\Controllers;

class ServiceController extends SiteController
{
	/** Show service article by id
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
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
