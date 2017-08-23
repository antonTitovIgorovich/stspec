<?php

namespace St\Helpers\ImageManager;

use Illuminate\Http\Request;

interface Strategy
{
    public function setRequest(Request $request);

    public function setInputName(string $inputName);

    public function getNamesArr();
}