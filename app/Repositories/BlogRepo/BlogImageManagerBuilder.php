<?php

namespace St\Repositories\BlogRepo;

use League\Flysystem\Exception;
use St\Repositories\ImageFileManagerBuilderAbstract;


class BlogImageManagerBuilder
	extends ImageFileManagerBuilderAbstract
{
	public function build()
	{
		switch ($this->inputName):
			case 'img_main':
				$destinationPath = config('storage_paths.blog.imgMain');
				break;
			case 'gallery_imgs' || 'remove_imgs':
				$destinationPath = config('storage_paths.blog.gallery');
				break;
			default :
				throw new Exception('The path is not correctly assigned');
		endswitch;

		return $this->storageManager
			->setDestinationPath($destinationPath);
	}
}