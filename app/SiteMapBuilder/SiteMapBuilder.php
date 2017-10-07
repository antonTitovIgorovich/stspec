<?php

namespace St\SiteMapBuilder;

use St\Models\{
	Blog, Service
};
use App;

class SiteMapBuilder
{
	const DATE = '2017-08-20T20:10:00+02:00';
	protected $siteMapApp;

	/**
	 * SiteMapBuilder constructor.
	 */
	public function __construct()
	{
		$this->siteMapApp = App::make('sitemap');
		$this->siteMapApp->setCache('laravel.sitemap', 60);
	}

	protected function createFromIndexPage()
	{
		$this->siteMapApp->add(url('/'), self::DATE, '1.0', 'monthly');
		return $this;
	}

	protected function createFromBlogListPage()
	{
		$this->siteMapApp->add(route('blog'), self::DATE, '0.9', 'daily');
		return $this;
	}

	protected function createFromBlogArticlePages()
	{
		$blogPost = Blog::orderBy('id', 'desc')->get();
		foreach ($blogPost as $post) {
			$image = [
				[
					'url' => asset('storage/blog/img_main') . "/" . $post->img_main,
					'title' => $post->title
				],
			];
			$this->siteMapApp->add(
				route('blogPost', ['id' => $post->id]),
				$post->updated_at, '0.9',
				'daily', $image
			);
		}
		return $this;
	}

	protected function createFromServiceArticlePages()
	{
		$service = Service::orderBy('id', 'desc')->get();
		foreach ($service as $article) {
			$image = [
				[
					'url' => asset('storage/service') . "/" . $article->img,
					'title' => $article->title
				],
			];
			$this->siteMapApp->add(
				route('serviceArticle', ['id' => $article->id]),
				$article->updated_at, '0.9',
				'daily',
				$image
			);
		}
		return $this;
	}

	protected function createFromContactPage()
	{
		$this->siteMapApp->add(route('contact'), self::DATE, '1.0', 'monthly');
		return $this;
	}

	public function build()
	{
		if (!$this->siteMapApp->isCached())
			$this->createFromIndexPage()
				->createFromBlogListPage()
				->createFromBlogArticlePages()
				->createFromServiceArticlePages()
				->createFromContactPage();
	}

	public function renderXml()
	{
		return $this->siteMapApp->render('xml');
	}
}