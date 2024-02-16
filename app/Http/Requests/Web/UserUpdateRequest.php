<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $id = $this->route('user')->id;
        return [
            'username' => 'required|string|unique:users,username,' . $id ,
            'mobile'   => 'required|string|unique:users,mobile,' . $id ,
            'password' => 'nullable|min:6',
            'lat'      => 'nullable|numeric|gt:0',
            'lng'      => 'nullable|numeric|gt:0',
            'image'    => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:4096',
            'role'     => 'nullable|in:admin,user,delivery'
        ];
    }
}
