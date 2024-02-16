<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:users,username',
            'mobile'   => 'required|string|unique:users,mobile',
            'password' => 'required|min:6',
            'lat'      => 'nullable|numeric|gt:0',
            'lng'      => 'nullable|numeric|gt:0',
            'image'    => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:4096',
            'role'     => 'nullable|in:admin,user,delivery'
        ];
    }
}
