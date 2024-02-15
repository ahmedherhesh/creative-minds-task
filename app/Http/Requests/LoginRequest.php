<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends MasterRequest
{

    public function rules(): array
    {
        return [
            'mobile'   => 'required|numeric|exists:users,mobile',
            'password' => 'required|min:6',
        ];
    }
}
