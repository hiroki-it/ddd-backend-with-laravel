<?php

declare(strict_types=1);

namespace App\UseCase\UseCases;

use App\Domain\User\Repository\UserRepository;
use App\Domain\User\Entity\User;
use App\Domain\User\ValueObject\UserAuthenticationCode;
use App\Domain\User\ValueObject\UserEmailAddress;
use App\Domain\User\ValueObject\UserName;
use App\Domain\User\ValueObject\UserPassword;
use App\Domain\User\ValueObject\UserPhoneNumber;
use App\UseCase\Inputs\UserInput;
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
     * @param UserInput $input
     */
    public function createUser(UserInput $input): void
    {
        $SmsAuthenticationService = new SmsAuthenticationService(
            config('sms.sns'),
            auth()->user()
        );

        $user = new User(
            null,
            new UserName($input->name()),
            new UserEmailAddress($input->type()),
            new UserPhoneNumber($input->phoneNumber()),
            new UserPassword($input->password()),
            new UserAuthenticationCode($SmsAuthenticationService->generateAuthenticationCode())
        );

        $this->userRepository->create($user);
    }
}
