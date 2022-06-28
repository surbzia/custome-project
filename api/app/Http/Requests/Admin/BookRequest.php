<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            $id = $this->route()->parameters['book']->id;
        }
        return [
            'name' => 'required|unique:books,name,' . ($count ? $id : 0),
            'sku' => 'required|unique:books,sku,' . ($count ? $id : 0),
            'slug' => 'required',
            'stock_qty' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'short_description' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ];
    }
}
