<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

final class UserUpdateRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            '$emailAddress' => [
                'required',
            ],
            '$password' => [
                'required',
                'string',
            ],
        ];
    }
}
