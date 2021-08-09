<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\UseCase\Inputs\UserInput;
use App\UseCase\User\Interactors\UserInteractor;
use Illuminate\Http\RedirectResponse;

/**
 * ユーザコントローラクラス
 */
final class UserController extends Controller
{
    /**
     * ユースケースクラス
     *
     * @var UserInteractor
     */
    private UserInteractor $userInteractor;

    /**
     * コンストラクタインジェクション
     *
     * @param UserInteractor $userInteractor
     */
    public function __construct(UserInteractor $userInteractor)
    {
        $this->userInteractor = $userInteractor;
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

        $userCreateInput = new UserCreateInput($validated);

        $this->userInteractor->createUser($userCreateInput);

        return redirect('login.login')->with(['success' => 'ユーザを登録しました．ログインできます．']);
    }
}
