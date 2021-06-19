<?php

declare(strict_types=1);

namespace App\Usecases\Usecase;

use App\Domain\Entity\User\User;
use App\Domain\Repository\UserRepository;
use App\Domain\ValueObject\User\UserAuthenticationCode;
use App\Domain\ValueObject\User\UserEmailAddress;
use App\Domain\ValueObject\User\UserId;
use App\Domain\ValueObject\User\UserName;
use App\Domain\ValueObject\User\UserPassword;
use App\Domain\ValueObject\User\UserPhoneNumber;
use App\Usecase\Service\SmsAuthenticationService;

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
            new UserId(null),
            new UserName($validated['name']),
            new UserEmailAddress($validated['type']),
            new UserPhoneNumber($validated['phone_number']),
            new UserPassword($validated['password']),
            new UserAuthenticationCode($SmsAuthenticationService->generateAuthenticationCode())
        );

        $this->userRepository->create($user);
    }
}
