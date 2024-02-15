<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends MasterRequest
{

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'code' => 'required|exists:codes,code',
        ];
    }
}
