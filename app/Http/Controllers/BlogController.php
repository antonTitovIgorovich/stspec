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
        $content = Blog::find($id);
        $images = $content->images;
        $comments = $content->comments;
        $commentsGroup = $comments->groupBy('parent_id');

        $lazyComments = $comments->load('user');
        foreach ($lazyComments as $comm) {
            if (empty($comm->name)) {
                $comm->name = isset($comm->user->name) ? $comm->user->name : 'Incognito';
            }
        }

        $this->setTemplate('blog-post');
        $this->addVars('content', $content);
        $this->addVars('images', $images);
        $this->addVars('commentsGroup', $commentsGroup);
        return $this->renderOutput();
    }
}
