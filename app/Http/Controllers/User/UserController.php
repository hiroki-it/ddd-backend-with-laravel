<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Domain\Entity\User\User;
use App\Domain\ValueObject\User\UserAuthenticationCode;
use App\Domain\ValueObject\User\UserEmailAddress;
use App\Domain\ValueObject\User\UserId;
use App\Domain\ValueObject\User\UserName;
use App\Domain\ValueObject\User\UserPassword;
use App\Domain\ValueObject\User\UserPhoneNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Infrastructure\Repositories\UserRepository;
use App\Services\Application\User\SmsAuthenticationService;
use Illuminate\Http\RedirectResponse;

/**
 * ユーザコントローラクラス
 */
final class UserController extends Controller
{
    /**
     * リポジトリクラス
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * コンストラクタインジェクション
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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

        $SmsAuthenticationService = new SmsAuthenticationService(
            config('sms.sns'),
            auth()->user()
        );

        $user = new User(
            new UserId(null),
            new UserName($validated['name']),
            new UserEmailAddress($validated['type']),
            new UserPhoneNumber($validated['phone_number']),
            new UserPassword($validated['password']),
            new UserAuthenticationCode($SmsAuthenticationService->generateAuthenticationCode())
        );

        $this->userRepository->create($user);

        return redirect('login.login', 302)->with(['success' => 'ユーザを登録しました．ログインできます．']);
    }
}
