<?php

namespace St\Http\Controllers;

use Illuminate\Http\Request;
use St\Models\Blog;
use Carbon\Carbon;

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
        $this->setTemplate('single-post');
        $this->addVars('content', Blog::find($id));
        return $this->renderOutput();
    }
}
