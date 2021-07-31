<?php

declare(strict_types=1);

namespace App\UseCase\UseCases;

use App\Domain\User\Repository\UserRepository;
use App\Domain\User\Entity\User;
use App\Domain\User\ValueObjects\UserAuthenticationCode;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Domain\User\ValueObjects\UserPhoneNumber;
use App\UseCase\Inputs\UserInput;
use App\Usecase\Services\UserSmsAuthenticationService;

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
        $SmsAuthenticationService = new UserSmsAuthenticationService(
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