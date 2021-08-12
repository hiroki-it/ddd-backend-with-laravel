<?php

declare(strict_types=1);

namespace App\UseCase\User\Interactors;

use App\Domain\User\Repository\UserRepository;
use App\Domain\User\Entity\User;
use App\Domain\User\ValueObjects\UserAuthenticationCode;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Domain\User\ValueObjects\UserPhoneNumber;
use App\UseCase\Interactor;
use App\UseCase\Services\UserSmsAuthenticationService;
use App\UseCase\User\Requests\UserCreateRequest;

/**
* ユーザユースケースクラス
*/
final class UserInteractor extends Interactor
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
     * @param UserCreateRequest $input
     */
    public function createUser(UserCreateRequest $input): void
    {
        $SmsAuthenticationService = new UserSmsAuthenticationService(config('sms.sns'), auth()->user());

        $user = new User(
            null,
            new UserName($input->name),
            new UserEmailAddress($input->emailAddress),
            new UserPhoneNumber($input->phoneNumber),
            new UserPassword($input->password),
            new UserAuthenticationCode($SmsAuthenticationService->generateAuthenticationCode)
        );

        $this->userRepository->create($user);
    }
}
