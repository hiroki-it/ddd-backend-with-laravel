<?php

declare(strict_types=1);

namespace App\UseCase\UseCases;

use App\Domain\Repositories\UserRepository;
use App\Domain\User\Entity\User;
use App\Domain\User\ValueObject\UserAuthenticationCode;
use App\Domain\User\ValueObject\UserEmailAddress;
use App\Domain\User\ValueObject\UserName;
use App\Domain\User\ValueObject\UserPassword;
use App\Domain\User\ValueObject\UserPhoneNumber;
use App\Usecase\Services\SmsAuthenticationService;

/**
* ユーザユースケースクラス
*/
final class UserUsecase extends Usecase
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
     * @param array $validated
     */
    public function createUser(array $validated): void
    {
        $SmsAuthenticationService = new SmsAuthenticationService(
            config('sms.sns'),
            auth()->user()
        );

        $user = new User(
            null,
            new UserName($validated['name']),
            new UserEmailAddress($validated['type']),
            new UserPhoneNumber($validated['phone_number']),
            new UserPassword($validated['password']),
            new UserAuthenticationCode($SmsAuthenticationService->generateAuthenticationCode())
        );

        $this->userRepository->create($user);
    }
}
