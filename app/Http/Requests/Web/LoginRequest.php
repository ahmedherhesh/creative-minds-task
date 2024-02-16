<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'mobile'   => 'required|numeric|exists:users,mobile',
            'password' => 'required|min:6',
        ];
    }
}
