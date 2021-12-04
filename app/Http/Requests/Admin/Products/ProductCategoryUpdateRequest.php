<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
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
            'title' => 'required|min:2|max:200',
            'parent_id' => 'integer|exists:product_categories,id',
            'slug' => 'max:200',
            'description_html' => 'max:3500',
            'title_seo' => 'max:400',
            'description_seo' => 'max:1500',
        ];
    }
}
