<?php

namespace St\Http\Controllers;

use St\Models\Blog;

class BlogController extends SiteController
{
    public function index()
    {
        $this->setTemplate('blog');
        $this->addVars('title', 'Блог');
        $this->addVars('posts', Blog::all());
        return $this->renderOutput();
    }

    public function show($id)
    {
        $content = Blog::find($id);
        $this->setTemplate('blog-post');
        $this->addVars('title', $content->title);
        $this->addVars('content', $content);
        return $this->renderOutput();
    }
}
