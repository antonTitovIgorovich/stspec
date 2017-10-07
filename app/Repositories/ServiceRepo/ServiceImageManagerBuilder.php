<?php

namespace St\Repositories\ServiceRepo;

use St\Repositories\ImageFileManagerBuilderAbstract;

class ServiceImageManagerBuilder
	extends ImageFileManagerBuilderAbstract
{
	public function build()
	{
		$destinationPath = config('storage_paths.services');
		return $this->storageManager
			->setDestinationPath($destinationPath);
	}
}