<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

final class UserCreateRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email_address' => [
                'required',
                'string',
                'email:rfc,dns'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
