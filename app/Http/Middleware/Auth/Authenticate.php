<?php

namespace App\Http\Middleware\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @param  Request  $request
     * @return string
     */
    protected function redirectTo($request): string
    {
        return route('/login');
    }
}
