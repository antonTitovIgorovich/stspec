<?php

namespace St\Http\Controllers;

use St\Repositories\StockRepo\StockRepoContract;
use St\SiteMapBuilder\SiteMapBuilder;
use St\Models\{
	Blog, Service
};
use App;


class IndexController extends SiteController
{
	protected $repository;

	function __construct(StockRepoContract $stock)
	{
		parent::__construct();
		$this->repository = $stock;
	}

	public function index()
	{
		$stocks = $this->repository->getAll();
		$this->setTemplate('index');
		$this->addVars('stocks', $stocks);
		return $this->renderOutput();
	}

	public function siteMap()
	{
		/*$siteMap = new SiteMapBuilder();
		$siteMap->build();
		return $siteMap->renderXml();*/

		$sitemap = App::make("sitemap");
//		dd($sitemap);
//		$sitemap->setCache('laravel.sitemap', 60);
//		if (!$sitemap->isCached()):

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
			}

			//Contact
			$sitemap->add(route('contact'), '2017-08-20T20:10:00+02:00', '1.0', 'monthly');
//		endif;
		return $sitemap->render('xml');
	}

}
