<?php

namespace St\Http\Controllers;

use St\Models\Blog;

class BlogController extends SiteController
{

    public function index()
    {
        $posts = Blog::orderBy('id', 'desc')->paginate(5);
        $this->setTemplate('blog');
        $this->addVars('posts', $posts);
        return $this->renderOutput();
    }

    public function show($id)
    {
        $content = Blog::find($id);
        $this->setTemplate('blog-post');
        $this->addVars('content', $content);
        return $this->renderOutput();
    }
}
