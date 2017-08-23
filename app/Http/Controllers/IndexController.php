<?php

namespace St\Http\Controllers;

use St\Models\Stock;
use App;
use St\Models\{
    Blog,
    Service
};

class IndexController extends SiteController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->setTemplate('index');
        $this->addVars('stocks', Stock::all());
        return $this->renderOutput();
    }

    public function siteMap()
    {
        $sitemap = App::make('sitemap');
        $sitemap->setCache('laravel.sitemap', 60);
        if (!$sitemap->isCached()):
            // Index
            $sitemap->add(url('/'), '2017-08-20T20:10:00+02:00', '1.0', 'monthly');

            //Blog list
            $sitemap->add(route('blog'), '2017-08-20T20:10:00+02:00', '0.9', 'daily');

            //Blog post
            $blogPost = Blog::orderBy('id', 'desc')->get();
            foreach ($blogPost as $post) {
                $image = [
                    ['url' => asset('storage/blog/img_main') . "/" . $post->img_main, 'title' => $post->title],
                ];
                $sitemap->add(route('blogPost', ['id' => $post->id]), $post->updated_at, '0.9', 'daily', $image);
                unset($image);
            }

            //Service article
            $service = Service::orderBy('id', 'desc')->get();
            foreach ($service as $article) {
                $image = [
                    ['url' => asset('storage/service') . "/" . $article->img, 'title' => $article->title],
                ];
                $sitemap->add(
                    route('serviceArticle', ['id' => $article->id]),
                    $article->updated_at, '0.9',
                    'daily',
                    $image
                );
                unset($image);
            }

            //Contact
            $sitemap->add(route('contact'), '2017-08-20T20:10:00+02:00', '1.0', 'monthly');
        endif;
        return $sitemap->render('xml');
    }

}
