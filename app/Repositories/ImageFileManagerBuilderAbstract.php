<?php

namespace St\Repositories;


abstract class ImageFileManagerBuilderAbstract
{
	protected $storageManager;
	protected $inputName;

	public function __construct()
	{
		$this->storageManager = app('ImageStorageManager');
	}

	public function setInputName(string $inputName)
	{
		$this->storageManager->setInputName($inputName);
		$this->inputName = $inputName;
		return $this;
	}

	abstract public function build();
}