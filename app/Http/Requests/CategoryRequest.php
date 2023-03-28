<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'code' => 'required|min:6|max:100|unique:categories,code',
            'title' => 'required|min:3|max:100|unique:categories,title',
            'description' => 'required|min:5'
        ];
        if ($this->route()->named('categories.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
            $rules['title'] .= ',' . $this->route()->parameter('category')->id;;
        }
        return $rules;

    }

    public function messages()
    {
        return [
            'required' => '* Поле :attribute не може бути порожнім',
            'min' => '* Поле :attribute повинно містити не менше :min символів',
            'max' => '* Поле :attribute повинно містити не більше :max символів',
            'unique' =>'* Поле :attribute повторюється з іншими категоріями'
        ];
    }
}
