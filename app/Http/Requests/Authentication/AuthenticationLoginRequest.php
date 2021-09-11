<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\Request;

final class AuthenticationLoginRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email_address' => [
                'required',
                'string'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
