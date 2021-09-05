<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Authentication\AuthenticationRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

final class AuthenticationController
{
    /**
     * @return RedirectResponse
     */
    public function login(AuthenticationRequest $authenticationRequest)
    {
        $validated = $authenticationRequest->validated();

        if (auth()->attempt($validated)) {
            // セッションID固定化を防ぐために，認証後にセッションを再作成します．
            $authenticationRequest->session()->regenerate();

            // 認証後ページにリダイレクトします．
            return redirect(RouteServiceProvider::AUTHORIZE);
        }

        // 未認証ページにリダイレクトします．
        return redirect(RouteServiceProvider::UNAUTHORIZED);
    }
}
