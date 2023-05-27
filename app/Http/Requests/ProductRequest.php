<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'code' => 'required|min:6|max:100|unique:products,code',
            'title' => 'required|min:6|max:100|unique:products,title',
            'description' => 'required|min:5',
            'short_description' => 'required|min:5',
            'category_id' => 'required',
            'size' =>'required|min:1',
            'price' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'sale_price' => 'nullable|numeric|min:0',
        ];
        if ($this->route()->named('products.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
            $rules['title'] .= ',' . $this->route()->parameter('product')->id;;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => '* Поле :attribute не може бути порожнім',
            'min' => '* Поле :attribute повинно містити не менше :min символів',
            'max' => '* Поле :attribute повинно містити не більше :max символів',
            'unique' => '* Поле :attribute повторюється з іншими продуктами',
            'numeric' => 'Поле :attribute повинно містити тільки числові значення'
        ];
    }
}
