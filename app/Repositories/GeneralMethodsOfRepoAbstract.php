<?php

namespace St\Repositories;


abstract class GeneralMethodsOfRepoAbstract
{
	/**
	 * @return mixed
	 */
	public function getAll()
	{
		return $this->model->all();
	}

	/**
	 * @param int $limit
	 * @return mixed
	 */
	public function paginate(int $limit)
	{
		return $this->model
			->orderBy('id', 'desc')
			->paginate($limit);
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function getById(int $id)
	{
		return $this->model->getById($id);
	}
}