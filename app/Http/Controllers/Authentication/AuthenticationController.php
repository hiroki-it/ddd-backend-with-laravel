<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Authentication\AuthenticationLoginRequest;
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

        // NOTE: テストする時は，ストレッチ８回でBCryptハッシュ値生成サービスを使用すること．
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
     * @param AuthenticationLoginRequest $authenticationRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(AuthenticationLoginRequest $authenticationRequest)
    {
        auth()->logout();

        // セッションを削除します．
        $authenticationRequest->session()->invalidate();

        // CSRFトークンを再生成します．
        $authenticationRequest->session()->regenerateToken();

        return redirect(RouteServiceProvider::UNAUTHENTHICATED);
    }
}
