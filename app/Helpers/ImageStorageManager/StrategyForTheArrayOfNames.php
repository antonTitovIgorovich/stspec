<?php

namespace St\Helpers\ImageStorageManager;

use Illuminate\Http\Request;


class StrategyForTheArrayOfNames implements StrategyInterface
{
    const STRING_FLAG = 'string';
    private $strategy;

    public function __construct($strategy)
    {
        switch ($strategy) {
            case self::STRING_FLAG :
                $this->strategy = new StringStrategy();
        }
    }

    public function setRequest(Request $request)
    {
        $this->strategy->setRequest($request);
    }

    public function setInputName(string $inputName)
    {
        $this->strategy->setInputName($inputName);
    }

    public function getNamesArr()
    {
        return $this->strategy->getNamesArr();
    }
}