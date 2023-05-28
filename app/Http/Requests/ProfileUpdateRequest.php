<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
    public function messages(){
        return [
            'string' => '* Поле :attribute не може містити тільки числові значення',
            'max' => '* Поле :attribute не повинно містити стільки символів',
            'email' => '* Вкажіть коректний адрес електронної пошти',
            'unique' => '* Користувач з таким email вже існує'
        ];
    }
}
