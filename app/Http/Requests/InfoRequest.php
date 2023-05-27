<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'phone' => 'required|min:6|max:15',
            'email' => 'required|min:6|max:50',
            'address' => 'required|min:6|max:50',
            'description' => 'required|min:5',
            'short_description' => 'required|min:5|max:300',
            'privacy_policy' => 'required|min:100'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => '* Поле :attribute не може бути порожнім',
            'min' => '* Поле :attribute повинно містити не менше :min символів',
            'max' => '* Поле :attribute повинно містити не більше :max символів',
        ];
    }
}
