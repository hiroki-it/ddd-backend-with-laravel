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
        // ユーザの未認証時に，認証ページにリダイレクトできるように，URLを生成します．
        return url('/login');
    }
}
