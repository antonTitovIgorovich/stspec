<?php
namespace St\Helpers\Traits;

use Illuminate\Http\Request;

trait ImageMultiManagement
{
    public function multiUploadImages(Request $request, callable $callback)
    {
        if ($request->hasFile($this->inputName)) {
            $images = $request->{$this->inputName};
            $fileNamesArr = array_map(function ($img){
                return $this->upload($img);
            }, $images);

            $callback($fileNamesArr);
        }
        return false;
    }


    public function multiRemoveImages(Request $request, callable $callback)
    {
        $inputNameExist = function () use ($request): bool {
            return $request->has($this->inputName)
            && is_string($request->{$this->inputName})
                ? true
                : false;
        };

        $getCleanArr = function (string $string): array {
            $arrWithSpace = explode('%', $string);
            $result = array_filter($arrWithSpace, function ($val) {
                return $val !== '';
            });
            return $result;
        };

        if ($inputNameExist()) {
            $namesArr = $getCleanArr($request->{$this->inputName});
            foreach ($namesArr as $fileName) {
                $this->removeImage($fileName);
            }
            $callback($namesArr);
        }

        return false;
    }
}