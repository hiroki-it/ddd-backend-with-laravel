<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\UseCase\UseCases\UserUsecase;
use Illuminate\Http\RedirectResponse;

/**
 * ユーザコントローラクラス
 */
final class UserController extends Controller
{
    /**
     * ユースケースクラス
     *
     * @var UserUsecase
     */
    private UserUsecase $userUsecase;

    /**
     * コンストラクタインジェクション
     *
     * @param UserUsecase $userUsecase
     */
    public function __construct(UserUsecase $userUsecase)
    {
        $this->userUsecase = $userUsecase;
    }

    /**
     * ユーザを作成します．
     *
     * @param UserRequest $userRequest
     * @return RedirectResponse
     */
    public function createUser(UserRequest $userRequest): RedirectResponse
    {
        $validated = $userRequest->validated();

        $this->userUsecase->createUser($validated);

        return redirect('login.login')->with(['success' => 'ユーザを登録しました．ログインできます．']);
    }
}
