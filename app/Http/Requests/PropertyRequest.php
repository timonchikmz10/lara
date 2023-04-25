<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'rgb_code' => 'required|min:6|max:100|unique:properties,rgb_code',
            'title' => 'required|min:3|max:100|unique:properties,title',
        ];
        if ($this->route()->named('properties.update')) {
            $rules['rgb_code'] .= ',' . $this->route()->parameter('color')->id;
            $rules['title'] .= ',' . $this->route()->parameter('color')->id;;
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
