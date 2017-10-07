<?php

namespace St\Helpers\ImageStorageManager;

use Illuminate\Http\Request;

class StringStrategy implements StrategyInterface
{
    private $request;
    private $inputName;
    private $inputValue;

    protected function inputValueExist()
    {
        if ($this->request->has($this->inputName)) {
            
            $this->setInputValue();
            
            return is_string($this->inputValue);
        };

        return false;
    }

    protected function setInputValue()
    {
        $this->inputValue = $this->request->{$this->inputName};
    }

    public function setInputName(string $inputName)
    {
        $this->inputName = $inputName;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getNamesArr()
    {
        if ($this->inputValueExist()) {
            $arrayWithEmptyItem = explode('%', $this->inputValue);
            
            $result = array_filter($arrayWithEmptyItem, function ($val) {
                return $val !== '';
            });

            return $result;
        }
    }
}