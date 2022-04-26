<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'article' => ['required', 'regex:/[a-zA-Z0-9]/', Rule::unique(Product::TABLE, 'article')->ignore($this->product->id)],
            'name' => 'required|min:10',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'article.required' => 'Поле Артикул обязательное',
            'article.regex' => 'Поле Артикул должно состоять из латинских и цифр',
            'article.unique' => 'Такие данные уже существуют',
            'name.required' => 'Поле Название обязательное',
            'name.min' => 'Поле Название должно быть не меньше 10 символов',
            'status.required' => 'Поле Статус обязательное',
        ];
    }
}
