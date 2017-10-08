<?php

namespace St\Http\Controllers;

use St\Repositories\StockRepo\StockRepoContract;
use St\SiteMapBuilder\SiteMapBuilder;


class IndexController extends SiteController
{
	protected $repository;

	public function __construct(StockRepoContract $stock)
	{
		parent::__construct();
		$this->repository = $stock;
	}

	/**
	 * Render index page
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$stocks = $this->repository->getAll();
		$this->setTemplate('index');
		$this->addVars('stocks', $stocks);
		return $this->renderOutput();
	}

	/**
	 * Render dynamic sitemap.xml.
	 * @return \St\SiteMapBuilder\
	 */
	public function siteMap()
	{
		$siteMap = new SiteMapBuilder();
		$siteMap->build();
		return $siteMap->renderXml();
	}

}
