<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class UserCreateRequest extends FormRequest
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
                'string'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
