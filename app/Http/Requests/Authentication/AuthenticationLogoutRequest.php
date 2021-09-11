<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\Request;

final class AuthenticationLogoutRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
