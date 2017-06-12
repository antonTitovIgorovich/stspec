<?php

namespace St\Http\Controllers;

use St\Models\Blog;

class BlogController extends SiteController
{
    public function index()
    {
        $this->setTemplate('blog');
        $this->addVars('posts', Blog::all());
        return $this->renderOutput();
    }

    public function showPost($id)
    {
        $this->setTemplate('blog-post');
        $this->addVars('content', Blog::find($id));
        return $this->renderOutput();
    }
}
