<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Repositories;

use App\Domain\User\Ids\UserId;
use App\Domain\User\Repositories\UserRepository as UserRepositoryInterface;
use App\Domain\User\Entities\User;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Infrastructure\Repository;
use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * ユーザリポジトリ実装クラス
 */
final class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @var UserDTO
     */
    private UserDTO $userDTO;

    /**
     * @param UserDTO $userDTO
     */
    public function __construct(UserDTO $userDTO)
    {
        $this->userDTO = $userDTO;
    }

    /**
     * @param UserId $userId
     * @return User
     */
    public function findById(UserId $userId): User
    {
        $userDTO = $this->userDTO
            ->find($userId->id);

        // DTOのデータをドメインモデルに詰め替えます．
        return $userDTO->toUser();
    }

    /**
     * @param UserEmailAddress $userEmailAddress
     * @return User|null
     */
    public function findByEmail(UserEmailAddress $userEmailAddress): User|null
    {
        $userDTO = $this->userDTO
                ->where('email_address', $userEmailAddress->emailAddress)
                ->get();

        if (!$userDTO) {
            return null;
        }

        // DTOのデータをドメインモデルに詰め替えます．
        return $userDTO->toUser();
    }

    /**
     * @param User $user
     * @return void
     * @throws Throwable
     */
    public function create(User $user): void
    {
        DB::transaction(function () use ($user) {

            // ドメインモデルのデータをDTOに詰め替えます．
            $this->userDTO
                ->create([
                    'name'          => $user->userName->name,
                    'email_address' => $user->userEmailAddress->emailAddress,
                    'password'      => bcrypt($user->userPassword->password)
                ]);
        });
    }

    /**
     * @param User $user
     * @return void
     * @throws Throwable
     */
    public function update(User $user): void
    {
        DB::transaction(function () use ($user) {

            // ドメインモデルのデータをDTOに詰め替えます．
            $this->userDTO
                ->find($user->id->id)
                ->fill([
                    'name'          => $user->userName->name,
                    'email_address' => $user->userEmailAddress->emailAddress,
                    'password'      => bcrypt($user->userPassword->password)
                ])
                ->save();
        });
    }

    /**
     * @param UserId $userId
     * @return void
     * @throws Throwable
     */
    public function delete(UserId $userId): void
    {
        DB::transaction(function () use ($userId) {
            $this->userDTO->destroy($userId->id);
        });
    }
}
