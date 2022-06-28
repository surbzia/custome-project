<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $count = count($this->route()->parameters) > 0;
        if ($count) {
            $id = $this->route()->parameters['category']->id;
        }
        return [
            'name' => 'required|unique:categories,name,' . ($count ? $id : 0),
            'slug' => 'required',
            'short_description' => 'required',
        ];
    }
}
