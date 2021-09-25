<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Authentication\AuthenticationLoginRequest;
use App\Http\Requests\Authentication\AuthenticationLogoutRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

final class AuthenticationController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json();
    }

    /**
     * @param AuthenticationLoginRequest $authenticationLoginRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function login(AuthenticationLoginRequest $authenticationLoginRequest)
    {
        $validated = $authenticationLoginRequest->validated();

        if (auth()->attempt($validated)) {
            // セッションID固定化を防ぐために，認証後にセッションを再作成します．
            $authenticationLoginRequest->session()->regenerate();

            // 認証後ページにリダイレクトします．
            return redirect(RouteServiceProvider::AUTHENTHICATED);
        }

        // 認証前または認証失敗時は，認証前ページにリダイレクトします．
        return redirect(RouteServiceProvider::UNAUTHENTHICATED);
    }

    /**
     * @param AuthenticationLogoutRequest $authenticationLogoutRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(AuthenticationLogoutRequest $authenticationLogoutRequest)
    {
        auth()->logout();

        // セッションを削除します．
        $authenticationLogoutRequest->session()->invalidate();

        // CSRFトークンを再生成します．
        $authenticationLogoutRequest->session()->regenerateToken();

        return redirect(RouteServiceProvider::UNAUTHENTHICATED);
    }
}
