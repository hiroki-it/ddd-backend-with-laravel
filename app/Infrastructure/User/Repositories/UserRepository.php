<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Repositories;

use App\Domain\User\Repository\UserRepository as DomainUserRepository;
use App\Domain\User\Entity\User;
use App\Infrastructure\Repository;
use App\Infrastructure\User\DTOs\UserDTO;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * ユーザリポジトリ実装クラス
 */
final class UserRepository extends Repository implements DomainUserRepository
{
    /**
     * ユーザDTOクラス
     *
     * @var UserDTO
     */
    private UserDTO $userDTO;

    /**
     * コンストラクタインジェクション
     *
     * @param UserDTO $userDTO
     */
    public function __construct(UserDTO $userDTO)
    {
        $this->userDTO = $userDTO;
    }

    /**
     * @param User $user
     * @return User
     * @throws Throwable
     */
    public function create(User $user): User
    {
        return DB::transaction(function () use ($user) {
            // ドメインエンティティのデータをDTOに詰め替えます．
            return $this->userDTO
                ->create([
                    'name'         => $user->name,
                    'emailAddress' => $user->emailAddress,
                    'password'     => $user->password
                ]);
        });
    }

    /**
     * @param User $user
     * @return bool
     * @throws Throwable
     */
    public function update(User $user): bool
    {
        $userDTO = $this->userDTO
            ->find($user->id());

        // ドメインエンティティのデータをDTOに詰め替えます．
        $userDTO->fill([
            'name'         => $user->name,
            'emailAddress' => $user->emailAddress,
            'password'     => $user->password
        ]);

        return DB::transaction(function () use ($userDTO) {
            return $userDTO->save();
        });
    }

    /**
     * @param User $user
     * @return bool
     * @throws Throwable
     */
    public function delete(User $user): bool
    {
        $userDTO = $this->userDTO
            ->find($user->id());

        return DB::transaction(function () use ($userDTO) {
            return $userDTO::delete();
        });
    }
}
