<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = $this->route('user')->id;
        return [
            'username' => 'required|string|unique:users,username,' . $user_id,
            'mobile'   => 'required|numeric|unique:users,mobile,' . $user_id,
            'password' => 'required|min:6',
            'lat'      => 'nullable|numeric|gt:0',
            'lng'      => 'nullable|numeric|gt:0',
            'image'    => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:4096',
        ];
    }
}
