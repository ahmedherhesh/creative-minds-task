<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends MasterRequest
{

    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:users,username',
            'mobile'   => 'required|numeric|unique:users,mobile',
            'password' => 'required|min:6',
            'lat'      => 'nullable|numeric|gt:0',
            'lng'      => 'nullable|numeric|gt:0',
            'image'    => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:4096',
        ];
    }
}
