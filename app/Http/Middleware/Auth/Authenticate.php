<?php

namespace App\Http\Middleware\Auth;

use App\Providers\RouteServiceProvider;
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
        // ユーザが認証されていない場合に，認証ページにリダイレクトできるように，URLを生成します．
        return url(RouteServiceProvider::UNAUTHORIZED);
    }
}
