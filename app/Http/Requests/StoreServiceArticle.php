<?php

namespace St\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'img' => 'required|image',
            'text' => 'required'
        ];
    }
}
