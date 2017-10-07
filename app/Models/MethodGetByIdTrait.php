<?php

namespace St\Models;


trait MethodGetByIdTrait
{
	/**
	 * Get Article by id
	 * @param int $id
	 * @return static Service
	 */
	public function getById(int $id)
	{
		return self::find($id);
	}
}