<?php

namespace St\Http\Controllers;

use St\Repositories\ServiceRepo\ServiceRepo;

class SiteController extends Controller
{
	protected $template;
	protected $vars = [];

	/**
	 * SiteController constructor.
	 */
	public function __construct()
	{
		$service = new ServiceRepo();
		$this->addVars('services', $service->getAll());
	}

	/**
	 * Set template path from view().
	 * @param string $template
	 */
	protected function setTemplate(string $template)
	{
		$this->template = $template;
	}

	/**
	 * Add vars from view().
	 *
	 * @param string $key
	 * @param  $value
	 */
	protected function addVars(string $key, $value)
	{
		$this->vars[$key] = $value;
	}

	/**
	 * Render view.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	protected function renderOutput()
	{
		return view($this->template, $this->vars);
	}
}
