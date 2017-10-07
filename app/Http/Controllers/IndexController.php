<?php

namespace St\Http\Controllers;

use St\Repositories\StockRepo\StockRepoContract;
use St\SiteMapBuilder\SiteMapBuilder;


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
		$siteMap = new SiteMapBuilder();
		$siteMap->build();
		return $siteMap->renderXml();
	}

}
