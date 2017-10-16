<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 08.10.17
 * Time: 22:58
 */

namespace St\Models;


trait MethodGetByIdTrait
{
	/**
	 * Get article by id
	 * @param int $id
	 * @return mixed|static
	 */
	public function getById(int $id)
	{
		return self::find($id);
	}
}