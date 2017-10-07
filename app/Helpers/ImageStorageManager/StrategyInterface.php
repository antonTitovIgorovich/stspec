<?php

namespace St\Helpers\ImageStorageManager;

use Illuminate\Http\Request;

interface StrategyInterface
{
    public function setRequest(Request $request);

    public function setInputName(string $inputName);

    public function getNamesArr();
}